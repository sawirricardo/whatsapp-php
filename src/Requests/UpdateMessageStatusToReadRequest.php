<?php

namespace Sawirricardo\Whatsapp\Requests;

class UpdateMessageStatusToReadRequest
{
    private $messageId;

    public function __construct($messageId)
    {
        $this->messageId = $messageId;
    }

    protected function defaultData()
    {
        return [
            'messaging_product' => 'whatsapp',
            'status' => true,
            'message_id' => $this->messageId,
        ];
    }
}
