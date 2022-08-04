<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use WithFaker;
    use DatabaseTransactions;

    public function user_can_be_created()
    {
        $phone = '+256755337121';

        User::factory()->create(['phone' => $phone]);

        $this->assertDatabaseHas('users', [
            'phone' => $phone
        ]);
    }

    public function test_user_can_signup_using_api()
    {
        $user = User::factory()->make();

        $response = $this->postJson('/api/signup', $user->getAttributes());

        $response
        ->assertStatus(201)
        ->assertJsonPath('data.phone', $user->phone);
    }

    public function test_user_can_login_using_api()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', ['phone' => $user->phone, 'password' => 'password']);

        $response->assertStatus(200);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', ['phone' => $user->phone, 'password' => 'password']);

        $profileResponse = $this->withHeaders([
            'Authorization' => 'Bearer '.$response->json()['access_token']
        ])->postJson('/api/logout', ['token' => $response->json()['token']]);

        return $profileResponse
            ->assertStatus(200)
            ->assertJsonPath('logout', 'successful');
    }
}
