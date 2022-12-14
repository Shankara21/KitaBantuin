<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->post('/register', [
            'name' => 'testing',
            'email' => 'testinguas@gmail.com',
            'password' => '123',
            'password_confirmation' => '123'
        ]);
        $response->assertStatus(302);
    }
}
