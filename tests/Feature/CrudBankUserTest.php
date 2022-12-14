<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudBankUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_index_bank_user()
    // {
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->get('/bank-user');
    //     $response->assertStatus(200);
    //     $response->assertViewIs('Admin.BankUser.index');
    // }
    public function test_store_bank_user()
    {
        $response = $this->post('/login', [
            'email' => 'Timur',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $response = $this->post('/bank-user', [
            'name' => 'ovo',
            'image' => 'image.png',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/bank-user');
    }
    // public function test_update_bank_user()
    // {
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->put('/bank-user/shopeepay', [
    //         'name' => 'Shopeepay Testing',
    //         'image' => 'image.jpeg',
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/bank-user');
    // }
    // public function test_delete_bank_user()
    // {
    //     $response = $this->post('/login', [
    //         'email' => 'Timur',
    //         'password' => '123'
    //     ]);
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/dashboard');

    //     $response = $this->delete('/bank-user/bri');
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/bank-user');
    // }
}
