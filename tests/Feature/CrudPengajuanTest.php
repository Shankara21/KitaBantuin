<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudPengajuanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_pengajuan()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/worker-details');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.WorkerDetails.index');
    }
    public function test_update_pengajuan()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->put('/worker-details/2',);
        $response->assertStatus(302);
        $response->assertRedirect('/worker-details');
    }
    public function test_delete_pengajuan()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/worker-details/2');
        $response->assertStatus(302);
        $response->assertRedirect('/worker-details');
    }
}
