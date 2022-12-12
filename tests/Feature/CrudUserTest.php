<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/user');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.User.index');
    }
    public function test_show_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/user/User');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.User.show');
    }
    public function test_create_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/user', [
            'name' => 'Testing',
            'email' => 'testingg@gmail.com',
            'password' => '123',
            'role' => 'User',
            'photo' => 'image.jpeg',
            'gender' => 'Laki-laki',
            'address' => 'Jl. Testing',
            'phone' => '08123456789',
            'bank_account' => null,
        ]);
        $response->assertRedirect('/user');
    }
    public function test_update_user(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/user/Testing', [
            'name' => 'Testing',
            'email' => 'update@gmail.com',
            'password' => '123',
            'role' => 'User',
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

        $response = $this->delete('/user/Testing');
        $response->assertRedirect('/user');
    }
}
