<?php

namespace Sawirricardo\Whatsapp\Data;

class InteractiveListMessageData extends InteractiveMessageData
{
    public $header;
    public $body;
    public $footer;
    public $buttonText;
    public $sections;

    public static function make()
    {
        return new static();
    }

    public function header($text)
    {
        $this->header = $text;

        return $this;
    }

    public function body($text)
    {
        $this->body = $text;

        return $this;
    }

    public function footer($text)
    {
        $this->footer = $text;

        return $this;
    }

    public function buttonText($text)
    {
        $this->buttonText = $text;

        return $this;
    }

    /** @param SectionData $section */
    public function addSection($section)
    {
        $this->sections[] = $section;

        return $this;
    }

    public function toArray()
    {
        return [
            'type' => 'list',
            'header' => ['text' => $this->header],
            'body' => ['text' => $this->body],
            'footer' => ['text' => $this->footer],
            'action' => [
                'button' => $this->buttonText,
                'sections' => array_map(function ($section) {
                    return $section->toArray();
                }, $this->sections),
            ],
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
