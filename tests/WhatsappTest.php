<?php

use Illuminate\Support\Facades\Http;
use Sawirricardo\Whatsapp\Data\ResponseData;
use Sawirricardo\Whatsapp\Data\TextMessageData;
use Sawirricardo\Whatsapp\Whatsapp;

it('can send Text Message Data', function () {
    Http::fake([
        '*' => Http::response(json_decode(file_get_contents('tests/stubs/response_message_200.json'), true)),
    ]);

    $response = Whatsapp::make('token', 'phone')
        ->to('+62000000000')
        ->message(TextMessageData::make('Hello World'))
        ->send();

    expect($response)
        ->toBeInstanceOf(ResponseData::class)
        ->and($response->contacts)->toBeArray()
        ->and($response->messages)->toBeArray()
        ->and($response->messagingProduct)->toBe('whatsapp');
});
