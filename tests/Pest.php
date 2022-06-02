<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

function createFakeClient($responses)
{
    $mock = new MockHandler($responses);

    $handler = HandlerStack::create($mock);

    return new Client(['handler' => $handler]);
}
