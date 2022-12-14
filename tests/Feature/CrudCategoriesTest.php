<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_categories()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/categories');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Category.index');
    }
    public function test_create_categories()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/categories', [
            'name' => 'Testing',
            'slug' => 'testing',
            'image' => 'image.jpg',
        ]);
        $response->assertRedirect('/categories');
    }
    public function test_delete_categories()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/categories/testing');
        $response->assertRedirect('/categories');
    }
    public function test_update_categories()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/categories/website-programming', [
            'name' => 'Web',
            'slug' => 'web',
            'image' => 'image.jpg',
        ]);
        $response->assertRedirect('/categories');
    }
}
