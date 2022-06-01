<?php

use Sawirricardo\Whatsapp\Webhook;

it('can listen for event', function () {
    Webhook::make('token', 'verifyToken')
        ->whenTexted(function ($message) {
        })
        ->process(json_decode(file_get_contents('tests/stubs/webhook_payload_text_message.json'), true));
})->markTestIncomplete();

it('can determine to process data or not', function () {
    $query = [
        'hub' => [
            'mode' => 'subscribe',
            'verify_token' => 'meatyhamhock',
            'challenge' => '1158201444',
        ],
    ];
    expect(Webhook::make('token', 'meatyhamhock')->shouldProcess($query))
        ->toBeTrue();
});
