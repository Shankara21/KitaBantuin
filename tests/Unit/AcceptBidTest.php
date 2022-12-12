<?php

namespace Tests\Unit;

use Tests\TestCase;

class AcceptBidTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_accept_bid()
    {
        $response = $this->post('/login', [
            'email' => 'w1@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('accept-bid/3', [
            'project_id' => 3,
            'bid_id' => 3,
            'status' => 'Accepted'
        ]);
    }
}
