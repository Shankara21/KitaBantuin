<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_project()
    {
        $response = $this->post('/login', [
            'email' => 'zuddin@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('create-project', [
            'user_id' => 6,
            'title' => 'ProjectTest',
            'sub_categories' => 'Java',
            'description' => 'asdfghjkl',
            'deadline' => '2022-12-30',
            'budget' => '100000-300000',
            'status' => 'open'
        ]);
    }
}
