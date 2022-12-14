<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudSubCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_sub_categories(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/subCategories');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.SubCategory.index');
    }
    public function test_create_sub_categories(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/subCategories', [
            'name' => 'Testing',
            'slug' => 'testing',
            'image' => 'image.jpg',
            'category_id' => '1'
        ]);
        $response->assertRedirect('/subCategories');
    }
    
    // public function test_update_sub_categories(){
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->put('/subCategories/testing', [
    //         'name' => 'Testing update',
    //         'slug' => 'testing update',
    //         'category_id' => '1',
    //         'image' => 'image.jpg',
    //     ]);
    //     $response->assertRedirect('/subCategories');
    // }
    // public function test_delete_sub_categories()
    // {
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->delete('/subCategories/testing');
    //     $response->assertRedirect('/subCategories');
    // }
}
