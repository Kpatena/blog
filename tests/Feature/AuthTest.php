<?php

namespace Tests\Feature;

use Tests\BaseTest;

class AuthTest extends BaseTest
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_is_user_authenticated()
    {
        $this->assertAuthenticated();
    }
}
