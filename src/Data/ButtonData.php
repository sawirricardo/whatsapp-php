<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ButtonData implements Arrayable, Jsonable
{
    private $type = 'reply';

    private $id;

    private $title;

    public static function make()
    {
        return new static();
    }

    public function reply()
    {
        $this->type = 'reply';

        return $this;
    }

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
            'reply' => [
                'id' => $this->id,
                'title' => $this->title,
            ],
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
