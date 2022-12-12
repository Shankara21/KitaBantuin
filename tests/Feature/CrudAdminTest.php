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
    public function test_index_admin()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Admin.index');
    }
    public function test_show_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/admin/3');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Admin.show');
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
            'name' => 'TestingAdm',
            'email' => 'testinggAdm@gmail.com',
            'password' => '123',
            'role' => 'User',
            'photo' => 'image.jpeg',
            'gender' => 'Laki-laki',
            'address' => 'Jl. Testing',
            'phone' => '08123456789',
            'bank_account' => '1',
        ]);
        $response->assertRedirect('/admin');
    }
    public function test_update_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/admin/3', [
            'name' => 'TestingAdmin',
            'email' => 'updateAdmin@gmail.com',
            'password' => '123',
            'role' => 'Admin',
            'photo' => 'image.jpeg',
        ]);
    }
    public function test_delete_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/admin/3');
        $response->assertRedirect('/admin');
    }
}
