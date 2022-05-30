<?php

namespace Sawirricardo\Whatsapp\Requests;

class CreateMessageRequest
{
    private $to;
    private $message;

    public function __construct($to, $message)
    {
        $this->to = $to;
        $this->message = $message;
    }

    public function getBody()
    {
        return array_merge($this->defaultData(), [
            'type' => $message->type,
        ], [$message->type => $message->]);
    }

    protected function defineEndpoint()
    {
        return '/messages';
    }

    protected function defaultData()
    {
        return [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $this->to,
        ];
    }
}
