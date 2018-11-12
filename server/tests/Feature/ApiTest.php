<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApiTest extends BaseFeatureTest
{
    use DatabaseMigrations;

    /** @test */
    public function an_incorrect_api_route_returns_json_404()
    {
        $this->withoutExceptionHandling();
        $this->json('GET', '/api/not-found')
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'message' => 'Not Found.'
            ]);
    }

    /** @test */
    public function a_user_can_login_with_correct_credentials()
    {
        $this->json('POST', '/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ])
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure(['access_token']);
    }

    /** @test */
    public function a_user_cannot_login_with_incorrect_credentials()
    {
        $this->json('POST', '/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'not-password',
        ])
            ->assertStatus(401)
            ->assertHeader('Content-Type', 'application/json');

        $this->json('POST', '/api/auth/login', [
            'email' => 'not-email',
            'password' => 'password',
        ])
            ->assertStatus(401)
            ->assertHeader('Content-Type', 'application/json');
    }

}
