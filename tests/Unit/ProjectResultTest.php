<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectResultTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_project_result()
    {
        $response = $this->post('/login', [
            'email' => 'w1@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('submit-project/3', [
            'project_id' => 3,
            'worker_id' => 8,
            'link' => 'https://www.google.com',
            'image' => 'result.jpg',
            'status' => 'Finished'
        ]);
    }
}
