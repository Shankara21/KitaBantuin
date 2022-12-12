<?php

namespace Tests\Unit;

use Tests\TestCase;

class BidProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_bid_project()
    {
        $response = $this->post('/login', [
            'email' => 'w1@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('create-bid', [
            'project_id' => 3,
            'price' => '200000',
        ]);
    }
}
