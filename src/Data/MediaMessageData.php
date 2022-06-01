<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class MediaMessageData implements HasMessageData
{
    private $id;
    private $type;

    public function image()
    {
        $this->type = 'image';

        return $this;
    }

    public function video()
    {
        $this->type = 'video';

        return $this;
    }

    public function audio()
    {
        $this->type = 'audio';

        return $this;
    }

    public function document()
    {
        $this->type = 'document';

        return $this;
    }

    public function sticker()
    {
        $this->type = 'sticker';

        return $this;
    }

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
