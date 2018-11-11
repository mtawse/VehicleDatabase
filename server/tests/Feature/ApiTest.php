<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApiTest extends TestCase
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
