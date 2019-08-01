<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class EscrowTransaction extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function createNewEscrowTransaction()
    {
        $response = $this->json('POST','/api/v1/escrow-transaction', [
            'sender_email' => 'john@doe.com',
            'sender_phone' => 123456789,
            'recipient_email' => 'jane@doe.com',
            'recipient_phone' => '1234567890',
            'items' => [
                [
                    'title' => 'Some title',
                    'description' => 'Some description',
                    'price' => 123,
                ],
                [
                    'title' => 'Another title',
                    'description' => 'Another description',
                    'price' => 456,
                ]
            ]
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
