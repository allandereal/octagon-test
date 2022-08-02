<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_use_can_signup()
    {
        $response = $this->postJson('/api/signup', [
            'first_name' => 'Allan',
            'last_name' => 'Ahumuza',
            'phone' => '0773020863',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_use_can_login()
    {
        $response = $this->postJson('/api/login', ['phone' => '0773020863', 'password' => 'password']);

        $response->assertStatus(200);
    }
}
