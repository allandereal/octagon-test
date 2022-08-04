<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use WithFaker;
    use DatabaseTransactions;

    public function test_logged_in_user_can_retrieve_their_profile()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', ['phone' => $user->phone, 'password' => 'password']);

        $profileResponse = $this->withHeaders([
            'Authorization' => 'Bearer '.$response->json()['access_token']
        ])->postJson('/api/profile', ['token' => $response->json()['token']]);

        return $profileResponse
            ->assertStatus(200)
            ->assertJsonPath('data.phone', $user->phone);
    }
}
