<?php

use Sawirricardo\Whatsapp\Webhook;

it('can listen for event', function () {
    $webhook = Webhook::make('token', 'verifyToken');
})->markTestIncomplete();
