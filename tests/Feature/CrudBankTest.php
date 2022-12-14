<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudBankTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_bank()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->get('/bank');
        $response->assertStatus(200);
        $response->assertViewIs('Admin.Bank.index');
    }
    // public function test_show_bank()
    // {
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->get('/bank/1');
    //     $response->assertStatus(200);
    // }
    public function test_create_bank()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/bank', [
            'name' => 'Bank of America',
            'slug' => 'boa',
            'account_number' => '123456789',
            'account_name' => 'Timur',
            'image' => 'image.jpg',
        ]);
        $response->assertRedirect('/bank');
    }
    public function test_delete_bank()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->delete('/bank/bri');
        $response->assertRedirect('/bank');
    }
}
