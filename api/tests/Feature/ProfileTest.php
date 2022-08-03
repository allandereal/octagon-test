<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function test_logged_in_user_can_retrieve_their_profile()
    {
        $response = $this->get('/api/profile');
        return $response->assertStatus(200);
    }
}
