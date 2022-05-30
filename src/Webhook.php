<?php

namespace Sawirricardo\Whatsapp;

use Illuminate\Support\Facades\Response;

class Webhook
{
    private $token;
    private $verifyToken;

    private $onMessaged;

    public function __construct($token, $verifyToken)
    {
        $this->token = $token;
        $this->verifyToken = $verifyToken;
    }

    public static function create($token, $verifyToken)
    {
        return new static($token, $verifyToken);
    }

    public function whenReceivedMessage($whenReceivedMessage)
    {
        $this->onMessaged = $whenReceivedMessage;

        return $this;
    }

    /** @var array<string, mixed> */
    public function listen($data)
    {
        call_user_func($this->onMessaged);
    }

    public function validate($data)
    {
        if (array_key_exists('hub', $data)) {
            $data = $data['hub'];
        }

        if (array_key_exists('mode', $data) && $data['mode'] === 'subscribe') {
            if ($this->verifyToken === $data['verify_token']) {
                return Response::make($data['challenge'], 200);
            }
        }

        return Response::make('', 403);
    }
}
