<?php

namespace Tests\Feature;

use App\Owner;
use App\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OwnersTest extends BaseFeatureTest
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_cannot_access_the_owners_resource()
    {
        $this->json('GET', '/api/owners')
            ->assertStatus(401);

        $this->json('GET', '/api/owners/1')
            ->assertStatus(401);
    }

    /** @test */
    public function a_json_response_of_owenrs_is_returned()
    {
        $owners = factory(Owner::class, 3)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/owners')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3, 'data')
            ->assertSee($owners->first()->last_name)
            ->assertSee($owners->last()->last_name);

    }

    /** @test */
    public function a_json_response_of_a_single_owner_is_returned()
    {
        $owner = factory(Owner::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/owners/' . $owner->id)
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($owner->first_name)
            ->assertSee($owner->company);
    }


    /** @test */
    public function a_json_response_of_vehicles_can_be_returned_with_a_single_owner()
    {
        $owner = factory(Owner::class)->create();
        $vehicles = factory(Vehicle::class, 3)->create([
            'owner_id' => $owner->id,
        ]);

        $unrelatedVehicle = factory(Vehicle::class)->create();

        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/owners/' . $owner->id . '/vehicles')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee($vehicles->first()->license_plate)
            ->assertSee($vehicles->last()->no_doors)
            ->assertJsonCount(3, 'data.vehicles')
            ->assertDontSee($unrelatedVehicle->license_plate);
    }


    /** @test */
    public function an_incorrect_request_for_an_owner_returns_json_404()
    {
        $this->actingAs($this->user, 'api')
            ->json('GET', '/api/owners/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }
}
