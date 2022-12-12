<?php

namespace Tests\Unit;

use Tests\TestCase;

class SubmitWorkerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_submit_worker()
    {
        $response = $this->post('/login', [
            'email' => 'w1@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('submitWorker', [
            'name' => 'w1',
            'email' => 'w1@gmail.com',
            'gender' => 'Laki_Laki',
            'address' => 'Malang',
            'phone' => '0812144332',
            'bankuser_id' => 4,
            'bank_account' => '20348923047',
            'photo' => 'image.jpg',
            'ktp' => 'ktp.jpg',
            'cv' => 'cv.jpg',
            'skill' => 'Java',
            'about' => 'asdfghjkl',
        ]);
    }
}
