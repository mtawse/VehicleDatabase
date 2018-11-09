<?php

namespace Tests\Feature;

use App\Vehicle;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VehiclesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_json_response_of_vehicles_is_returned()
    {
        $vehicles = factory(Vehicle::class, 5)->create();

        $this->json('GET', '/api/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(5)
            ->assertSee($vehicles->first()->type)
            ->assertSee($vehicles->last()->license_plate);

    }

    /** @test */
    public function when_a_collection_of_vehicles_is_returned_the_manufacturer_and_model_is_included()
    {
        $vehicles = factory(Vehicle::class, 5)->create();

        $this->json('GET', '/api/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(5)
            ->assertSee($vehicles->first()->manufacturer->name)
            ->assertSee($vehicles->first()->model->name)
            ->assertSee($vehicles->last()->manufacturer->name)
            ->assertSee($vehicles->last()->model->name);
    }

    /** @test */
    public function a_json_response_of_a_single_vehicle_is_returned()
    {
        $vehicle = factory(Vehicle::class)->create();

        $this->json('GET', '/api/vehicles/' . $vehicle->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicle->type)
            ->assertSee($vehicle->license_plate);
    }

    /** @test */
    public function when_a_single_vehicle_is_returned_related_data_is_also_returned()
    {
        $vehicle = factory(Vehicle::class)->create();

        $this->json('GET', '/api/vehicles/' . $vehicle->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicle->owner->last_name)
            ->assertSee($vehicle->manufacturer->name)
            ->assertSee($vehicle->model->name);
    }

    /** @test */
    public function an_incorrect_request_for_a_vehicle_returns_json_404()
    {
        $this->json('GET', '/api/vehicles/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }
}
