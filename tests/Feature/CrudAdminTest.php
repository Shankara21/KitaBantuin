<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_worker()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/worker');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Worker.index');
    }
    public function test_show_worker()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/worker/3');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Worker.show');
    }
    public function test_create_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/admin', [
            'name' => 'TestingWorker',
            'email' => 'testinggWorker@gmail.com',
            'password' => '123',
            'role' => 'Worker',
            'photo' => 'image.jpeg',
            'gender' => 'Laki-laki',
            'address' => 'Jl. Testing',
            'phone' => '08123456789',
            'bank_account' => '1',
        ]);
        $response->assertRedirect('/admin');
    }
    public function test_update_worker()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/worker/3', [
            'name' => 'Testingworker',
            'email' => 'updateworker@gmail.com',
            'password' => '123',
            'role' => 'worker',
            'photo' => 'image.jpeg',
        ]);
    }
    public function test_delete_worker()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/worker/3');
        $response->assertRedirect('/worker');
    }
}
