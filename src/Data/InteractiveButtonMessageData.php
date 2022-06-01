<?php

namespace Sawirricardo\Whatsapp\Data;

class InteractiveButtonMessageData extends InteractiveMessageData
{
    private $body;

    private $buttons;

    public static function make()
    {
        return new static();
    }

    public function body($text)
    {
        $this->body = $text;

        return $this;
    }

    public function addButton($button)
    {
        $this->buttons[] = $button;

        return $this;
    }

    public function toArray()
    {
        return [
            'type' => 'button',
            'body' => ['text' => $this->body],
            'action' => [
                'buttons' => array_map(function ($button) {
                    return $button->toArray();
                }, $this->buttons),
            ],
        ];
    }
}
