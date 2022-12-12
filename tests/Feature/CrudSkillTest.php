<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudSkillTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_skill(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/skill');
        $response->assertStatus(200);
    }
    public function test_update_skill(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/skill/php', [
            'name' => 'PHP update',
            'slug' => 'php-update',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/skill');

    }
    public function test_delete_skill(){
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/skill/java');
        $response->assertStatus(302);
        $response->assertRedirect('/skill');
    }
}
