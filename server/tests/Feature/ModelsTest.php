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

class ModelsTest extends TestCase
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
    public function unauthenticated_users_cannot_access_the_models_resource()
    {
        $this->json('GET', '/api/models')
            ->assertStatus(401);

        $this->json('GET', '/api/models/1')
            ->assertStatus(401);
    }

    /** @test */
    public function a_json_response_of_models_is_returned()
    {
        $models = factory(Model::class, 3)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/models')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3, 'data')
            ->assertSee($models->first()->name)
            ->assertSee($models->last()->name);

    }

    /** @test */
    public function a_json_response_of_a_single_model_is_returned()
    {
        $model = factory(Model::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/models/' . $model->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($model->name);
    }


    /** @test */
    public function a_json_response_of_vehicles_can_be_returned_with_a_single_model()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $model = factory(Model::class)->create(['manufacturer_id' => $manufacturer->id]);
        $vehicles = factory(Vehicle::class, 3)->create([
            'manufacturer_id' => $manufacturer->id,
            'model_id' => $model->id,
        ]);

        $unrelatedVehicle = factory(Vehicle::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/models/' . $manufacturer->id . '/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicles->first()->license_plate)
            ->assertSee($vehicles->last()->no_doors)
            ->assertJsonCount(3, 'data.vehicles')
            ->assertDontSee($unrelatedVehicle->license_plate);
    }


    /** @test */
    public function an_incorrect_request_for_a_model_returns_json_404()
    {
        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/models/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }
}
