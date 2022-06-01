<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class TextMessageData implements HasMessageData
{
    private $preview_url = false;
    private $body = null;

    public function withPreviewUrl()
    {
        $this->preview_url = true;

        return $this;
    }

    public function body($content)
    {
        $this->body = $content;

        return $this;
    }

    public function getType()
    {
        return 'text';
    }

    public function toArray()
    {
        return [
            'body' => $this->body,
            'preview_url' => $this->preview_url,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
