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
        $user = User::factory()->make(['phone' => '+256773020863']);
        
        $response = $this->postJson('/api/signup', $user->getAttributes());

        $response
        ->assertStatus(201)
        ->assertJsonPath('data.phone', $user->phone);
    }

    public function test_user_can_login_using_api()
    {
        $phone = '+256755337120';

        User::factory()->create(['phone' => $phone]);

        $response = $this->postJson('/api/login', ['phone' => $phone, 'password' => 'password']);

        $response->assertStatus(200);
    }
}
