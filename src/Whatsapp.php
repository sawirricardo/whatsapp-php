<?php

namespace Sawirricardo\Whatsapp;

use Illuminate\Support\Facades\Http;
use Sawirricardo\Whatsapp\Exceptions\MessageNotSetException;
use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class Whatsapp
{
    /** @var string */
    private $token;

    /** @var string */
    private $phoneId;

    /** @var string */
    private $to;

    /** @var HasMessageData|null */
    private $message;

    public function __construct($token, $phoneId)
    {
        $this->token = $token;
        $this->phoneId = $phoneId;
    }

    public static function make($token, $phoneId)
    {
        return new static($token, $phoneId);
    }

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    /** @param HasMessageData $message */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        if (is_null($this->message)) {
            throw new MessageNotSetException();
        }

        Http::asJson()->acceptJson()
            ->withToken($this->token)
            ->baseUrl($this->defineBaseUrl())
            ->post('/messages', [
                'recipient_type' => 'individual',
                'to' => $this->to,
                'type' => $this->message->getType(),
                $this->message->getType() => $this->message->toArray(),
            ]);
    }

    public function markAsRead($messageId)
    {
        Http::asJson()->acceptJson()
            ->withToken($this->token)
            ->baseUrl($this->defineBaseUrl())
            ->post('/messages', [
                'messaging_product' => 'whatsapp',
                'status' => 'read',
                'message_id' => $messageId,
            ]);
    }

    protected function defineBaseUrl()
    {
        return 'https://graph.facebook.com/v13.0/' . $this->phoneId;
    }
}
