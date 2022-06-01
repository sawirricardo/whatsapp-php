<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class TextMessageData implements HasMessageData
{
    private $previewUrl = false;
    private $body = null;

    public function __construct($body, $previewUrl)
    {
        $this->body = $body;
        $this->previewUrl = $previewUrl;
    }

    public static function make($body, $previewUrl = false)
    {
        return new static($body, $previewUrl);
    }

    public function withPreviewUrl()
    {
        $this->previewUrl = true;

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
            'preview_url' => $this->previewUrl,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
