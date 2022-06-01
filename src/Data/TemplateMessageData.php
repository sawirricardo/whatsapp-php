<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class TemplateMessageData implements HasMessageData
{
    private $name;
    private $languageCode;

    public function getType()
    {
        return 'template';
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
