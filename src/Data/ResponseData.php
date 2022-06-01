<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ResponseData implements Arrayable, Jsonable
{
    /** @var string */
    private $messagingProduct;

    /** @var array<int, ResponseContactData> */
    private $contacts;

    /** @var array<int, ResponseMessageData> */
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
            collect($data['contacts'])->map(function ($contact) {
                return ResponseContactData::fromArray($contact);
            })->toArray(),
            collect($data['messages'])->map(function ($message) {
                return ResponseMessageData::fromArray($message);
            })->toArray()
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
