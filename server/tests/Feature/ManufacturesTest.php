<?php

namespace Tests\Feature;

use App\Model;
use App\Manufacturer;
use App\Vehicle;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManufacturesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_json_response_of_manufacturers_is_returned()
    {
        $manufacturers = factory(Manufacturer::class, 5)->create();

        $this->json('GET', '/api/manufacturers')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(5)
            ->assertSee($manufacturers->first()->name)
            ->assertSee($manufacturers->last()->name);

    }

    /** @test */
    public function a_json_response_of_a_single_manufacturer_is_returned()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $this->json('GET', '/api/manufacturers/' . $manufacturer->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($manufacturer->name);
    }


    /** @test */
    public function a_json_response_of_models_can_be_returned_with_a_single_manufacturer()
    {
        $this->withoutExceptionHandling();
        $manufacturer = factory(Manufacturer::class)->create();
        $models = factory(Model::class, 5)->create(['manufacturer_id' => $manufacturer->id]);

        $this->json('GET', '/api/manufacturers/' . $manufacturer->id . '/models')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($models->first()->name)
            ->assertSee($models->last()->name);
    }


    /** @test */
    public function a_json_response_of_vehicles_can_be_returned_with_a_single_manufacturer()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $vehicles = factory(Vehicle::class, 5)->create(['manufacturer_id' => $manufacturer->id]);

        $this->json('GET', '/api/manufacturers/' . $manufacturer->id . '/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicles->first()->license_plate)
            ->assertSee($vehicles->last()->no_doors);
    }


    /** @test */
    public function an_incorrect_request_for_a_manufacturer_returns_json_404()
    {
        $this->json('GET', '/api/manufacturers/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }
}
