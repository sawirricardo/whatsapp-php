<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class MediaMessageData implements HasMessageData
{
    private $id;

    public function url($url)
    {
        $this->id = $url;

        return $this;
    }

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getType()
    {
        return 'media';
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
