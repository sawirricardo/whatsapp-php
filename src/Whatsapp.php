<?php

namespace Sawirricardo\Whatsapp;

use Sawirricardo\Whatsapp\Connectors\MessageConnector;
use Sawirricardo\Whatsapp\Requests\CreateMessageRequest;

class Whatsapp
{
    private $token;
    private $phoneId;

    public function __construct($token, $phoneId)
    {
        $this->token = $token;
        $this->phoneId = $phoneId;
    }

    public function sendMessage($to, $message)
    {
        return (new MessageConnector($this->token, $this->phoneId, ))
            ->send(
                new CreateMessageRequest($to, $message)
            );
    }
}
