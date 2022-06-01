<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class ContactMessageData implements HasMessageData
{
    private $contacts;

    public function getType()
    {
        return 'contacts';
    }

    public function toArray()
    {
        return array_map(function ($contact) {
        }, $this->contacts);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
