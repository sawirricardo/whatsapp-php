<?php

namespace Sawirricardo\Whatsapp;

use Illuminate\Support\Facades\Http;
use Sawirricardo\Whatsapp\Data\ResponseData;
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

    /** @return ?ResponseData */
    public function send($shouldThrow = false)
    {
        if (is_null($this->message)) {
            throw new MessageNotSetException();
        }

        $data = Http::asJson()->acceptJson()
            ->withToken($this->token)
            ->baseUrl($this->defineBaseUrl())
            ->post('/messages', [
                'recipient_type' => 'individual',
                'to' => $this->to,
                'type' => $this->message->getType(),
                $this->message->getType() => $this->message->toArray(),
            ])
            ->throwIf($shouldThrow)
            ->collect()
            ->toArray();

        return ResponseData::fromArray($data);
    }

    public function markAsRead($messageId, $shouldThrow = false)
    {
        Http::asJson()->acceptJson()
            ->withToken($this->token)
            ->baseUrl($this->defineBaseUrl())
            ->post('/messages', [
                'messaging_product' => 'whatsapp',
                'status' => 'read',
                'message_id' => $messageId,
            ])
            ->throwIf($shouldThrow);
    }

    protected function defineBaseUrl()
    {
        return 'https://graph.facebook.com/v13.0/' . $this->phoneId;
    }
}
