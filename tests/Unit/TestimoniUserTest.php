<?php

namespace Tests\Unit;

use Tests\TestCase;

class TestimoniUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_testimoni_user()
    {
        $response = $this->post('/login', [
            'email' => 'zuddin@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('submit-testimoni', [
            'user_id' => 6,
            'worker_id' => 8,
            'project_id' => 3,
            'rating' => 5,
            'deskripsi' => 'mantap'
        ]);
    }
}
