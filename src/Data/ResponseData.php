<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ResponseData implements Arrayable, Jsonable
{
    /** @var string */
    public $messagingProduct;

    /** @var array<int, ResponseContactData> */
    public $contacts;

    /** @var array<int, ResponseMessageData> */
    public $messages;

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
            array_map(function ($contact) {
                return ResponseContactData::fromArray($contact);
            }, $data['contacts']),
            array_map(function ($message) {
                return ResponseMessageData::fromArray($message);
            }, $data['messages'])
        );
    }

    public function toArray()
    {
        return [
            'messaging_product' => $this->messagingProduct,
            'contacts' => $this->contacts->toArray(),
            'messages' => $this->messages->toArray(),
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
