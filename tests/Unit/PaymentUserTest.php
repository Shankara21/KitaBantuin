<?php

namespace Tests\Unit;

use Tests\TestCase;

class PaymentUserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_payment_user()
    {
        $response = $this->post('/login', [
            'email' => 'zuddin@gmail.com',
            'password' => '123'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response = $this->post('submit-payment', [
            'user_id' => 6,
            'project_id' => 3,
            'bank_id' => 4,
            'bid_id' => 3,
            'amount' => 200000,
            'potongan' => 20000,
            'status' => 'Accepted',
            'jenis' => 'Pemasukan',
            'bukti_transfer' => 'bukti.jpg'
        ]);
    }
}
