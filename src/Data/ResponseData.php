<?php

namespace Sawirricardo\Whatsapp\Data;

class ResponseData
{
    private $messagingProduct;
    private $contacts;
    private $messages;

    public function __construct(
        $messagingProduct,
        $contacts,
        $messages
    ) {
        $this->messagingProduct = $messagingProduct;
        $this->contacts = $contacts;
        $this->messages = $messages;
    }

    public static function fromArray($data)
    {
        return new static(
            $data['messaging_product'],
            $data['contacts'],
            $data['messages']
        );
    }
}
