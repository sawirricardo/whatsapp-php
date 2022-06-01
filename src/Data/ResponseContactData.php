<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ResponseContactData implements Arrayable, Jsonable
{
    /** @var string */
    private $input;

    /** @var string */
    private $wa_id;

    public function __construct(
        $input,
        $wa_id
    ) {
        $this->input = $input;
        $this->wa_id = $wa_id;
    }

    public static function fromArray($data)
    {
        return new static(
            $data['input'],
            $data['wa_id']
        );
    }

    public function toArray()
    {
        return [
            'input' => $this->input,
            'wa_id' => $this->wa_id,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
