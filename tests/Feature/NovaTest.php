<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NovaTest extends TestCase
{
    /**
     * Test that the root is reachable.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the dashboard is reachable.
     *
     * @return void
     */
    public function testDashboard()
    {
        $response = $this->call('GET', '/dashboard');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the callback url can be posted to.
     *
     * @return void
     */
    public function testCallbackUrl()
    {
        $response = $this->call('POST', '/nova', [ 'status' => 'DUMMY', 'publicToken' => 'dummyToken' ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
