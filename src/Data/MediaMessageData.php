<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class MediaMessageData implements Arrayable, Jsonable
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
