<?php

namespace Sawirricardo\Whatsapp;

use Illuminate\Support\Facades\Response;

class Webhook
{
    /** @var string */
    private $token;

    /** @var string */
    private $verifyToken;

    /** @var ?callable */
    private $onMessaged;

    public function __construct($token, $verifyToken)
    {
        $this->token = $token;
        $this->verifyToken = $verifyToken;
    }

    public static function make($token, $verifyToken)
    {
        return new static($token, $verifyToken);
    }

    /** @param callable $whenMessageReceived */
    public function whenMessageReceived($whenMessageReceived)
    {
        $this->onMessaged = $whenMessageReceived;

        return $this;
    }

    /** @var array<string, mixed> */
    public function listen($data)
    {
        call_user_func($this->onMessaged, $data);
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
