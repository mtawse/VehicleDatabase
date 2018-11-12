<?php

namespace Tests\Feature;

use App\User;
use App\Model;
use App\Manufacturer;
use App\Vehicle;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManufacturesTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create(
            ['password' => Hash::make('password')]
        );
    }

    /** @test */
    public function unauthenticated_users_cannot_access_the_manufacturers_resource()
    {
        $this->json('GET', '/api/manufacturers')
            ->assertStatus(401);

        $this->json('GET', '/api/manufacturers/1')
            ->assertStatus(401);
    }

    /** @test */
    public function a_json_response_of_manufacturers_is_returned()
    {
        $manufacturers = factory(Manufacturer::class, 3)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/manufacturers')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3, 'data')
            ->assertSee($manufacturers->first()->name)
            ->assertSee($manufacturers->last()->name);

    }

    /** @test */
    public function a_json_response_of_a_single_manufacturer_is_returned()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/manufacturers/' . $manufacturer->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($manufacturer->name);
    }


    /** @test */
    public function a_json_response_of_models_can_be_returned_with_a_single_manufacturer()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $models = factory(Model::class, 3)->create(['manufacturer_id' => $manufacturer->id]);

        $unrelatedModel = factory(Model::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/manufacturers/' . $manufacturer->id . '/models')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($models->first()->name)
            ->assertSee($models->last()->name)
            ->assertJsonCount(3, 'data.models')
            ->assertDontSee($unrelatedModel->name);
    }


    /** @test */
    public function a_json_response_of_vehicles_can_be_returned_with_a_single_manufacturer()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $vehicles = factory(Vehicle::class, 3)->create(['manufacturer_id' => $manufacturer->id]);

        $unrelatedVehicle = factory(Vehicle::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/manufacturers/' . $manufacturer->id . '/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicles->first()->license_plate)
            ->assertSee($vehicles->last()->no_doors)
            ->assertJsonCount(3, 'data.vehicles')
            ->assertDontSee($unrelatedVehicle->license_plate);
    }


    /** @test */
    public function an_incorrect_request_for_a_manufacturer_returns_json_404()
    {
        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/manufacturers/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }
}
