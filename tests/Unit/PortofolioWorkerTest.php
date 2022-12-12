<?php

namespace Tests\Unit;

use Tests\TestCase;

class PortofolioWorkerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_portofolio()
    {
        $response = $this->post('/login', [
            'email' => 'w1@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('create-portofolio', [
            'worker_details_id' => 2,
            'title' => 'test',
            'image' => 'porto.jpg',
            'link' => 'https://www.google.com',
            'description' => 'asdfghjkl',
        ]);
    }
}
