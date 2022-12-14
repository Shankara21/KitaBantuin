<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudProjectResultTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_project_result(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/result');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.ProjectResult.index');
    }
}
