<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_health_check_returns_a_successful_response(): void
    {
        $response = $this->get('/health-check');

        $response->assertStatus(200);
    }
}
