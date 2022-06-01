<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ResponseMessageData implements Arrayable, Jsonable
{
    /** @var string */
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public static function fromArray($data)
    {
        return new static($data['id']);
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
