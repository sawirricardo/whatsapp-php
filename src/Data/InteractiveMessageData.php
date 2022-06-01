<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class InteractiveMessageData implements HasMessageData
{
    public function getType()
    {
        return 'interactive';
    }

    public function toArray()
    {
        return [];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
