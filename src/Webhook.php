<?php

namespace Sawirricardo\Whatsapp;

class Webhook
{
    /** @var string */
    private $token;

    /** @var string */
    private $verifyToken;

    /** @var ?callable */
    private $whenTexted;
    private $whenTextedWithContact;
    private $whenTextedWithLocation;
    private $whenTextedWithMedia;
    private $whenTextedWithSticker;

    private $whenListReplied;
    private $whenButtonsReplied;
    private $whenQuickButtonsReplied;

    private $whenMessageSent;
    private $whenMessageDelivered;
    private $whenMessageFailed;
    private $whenMessageDeleted;

    public function __construct($token, $verifyToken)
    {
        $this->token = $token;
        $this->verifyToken = $verifyToken;
    }

    public static function make($token, $verifyToken)
    {
        return new static($token, $verifyToken);
    }

    /** @param callable $whenTexted */
    public function whenTexted($whenTexted)
    {
        $this->whenTexted = $whenTexted;

        return $this;
    }

    /** @param callable whenTextedWithMedia */
    public function whenTextedWithMedia($whenTextedWithMedia)
    {
        $this->whenTextedWithMedia = $whenTextedWithMedia;

        return $this;
    }

    /** @param callable whenTextedWithSticker */
    public function whenTextedWithSticker($whenTextedWithSticker)
    {
        $this->whenTextedWithSticker = $whenTextedWithSticker;

        return $this;
    }

    /** @param callable whenTextedWithLocation */
    public function whenTextedWithLocation($whenTextedWithLocation)
    {
        $this->whenTextedWithLocation = $whenTextedWithLocation;

        return $this;
    }

    /** @param callable whenTextedWithContact */
    public function whenTextedWithContact($whenTextedWithContact)
    {
        $this->whenTextedWithContact = $whenTextedWithContact;

        return $this;
    }

    /** @param callable whenUnknownMessageReceived */
    public function whenUnknownMessageReceived($whenUnknownMessageReceived)
    {
        $this->whenUnknownMessageReceived = $whenUnknownMessageReceived;

        return $this;
    }

    public function whenMessageDelivered($whenMessageDelivered)
    {
        $this->whenMessageDelivered = $whenMessageDelivered;

        return $this;
    }

    public function whenMessageSent($whenMessageSent)
    {
        $this->whenMessageSent = $whenMessageSent;

        return $this;
    }

    public function whenMessageFailed($whenMessageFailed)
    {
        $this->whenMessageFailed = $whenMessageFailed;

        return $this;
    }

    public function whenMessageDeleted($whenMessageDeleted)
    {
        $this->whenMessageDeleted = $whenMessageDeleted;

        return $this;
    }

    public function whenQuickButtonsReplied($whenQuickButtonsReplied)
    {
        $this->whenQuickButtonsReplied = $whenQuickButtonsReplied;

        return $this;
    }

    public function whenButtonsReplied($whenButtonsReplied)
    {
        $this->whenButtonsReplied = $whenButtonsReplied;

        return $this;
    }

    public function whenListReplied($whenListReplied)
    {
        $this->whenListReplied = $whenListReplied;

        return $this;
    }

    public function whenUserNumberChanged($whenUserNumberChanged)
    {
        $this->whenUserNumberChanged = $whenUserNumberChanged;

        return $this;
    }

    /** @param callable || array<string, mixed> $data */
    public function process($data)
    {
        if (is_callable($data)) {
            $data = $data();
        }

        $metadata = data_get($data, 'entry.0.changes.0.value.metadata');
        $contacts = data_get($data, 'entry.0.changes.0.value.contacts.0');
        if (! is_null($status = data_get($data, 'entry.0.statuses.0'))) {
            if ($status['status'] === 'delivered') {
                call_user_func($this->whenMessageDelivered, $status);

                return;
            }
            if ($status['status'] === 'sent') {
                call_user_func($this->whenMessageSent, $status);

                return;
            }
        }

        if (! is_null($status = data_get($data, 'entry.0.changes.0.value.statuses.0'))) {
            if ($status['status'] === 'failed') {
                call_user_func($this->whenMessageFailed, $status);

                return;
            }
        }

        $message = data_get($data, 'entry.0.changes.0.value.messages.0');


        if (array_key_exists('location', $message)) {
            call_user_func($this->whenTextedWithLocation, $message);

            return;
        }

        if (array_key_exists('contacts', $message)) {
            call_user_func($this->whenTextedWithContact, $message);

            return;
        }

        if ($message['type'] === 'unsupported') {
            call_user_func($this->whenMessageDeleted, $message);

            return;
        }

        if ($message['type'] === 'text') {
            call_user_func($this->whenTexted, $message);

            return;
        }

        if ($message['type'] === 'image') {
            call_user_func($this->whenTextedWithMedia, $message);

            return;
        }

        if ($message['type'] === 'sticker') {
            call_user_func($this->whenTextedWithSticker, $message);

            return;
        }

        if ($message['type'] === 'unknown') {
            call_user_func($this->whenUnknownMessageReceived, $message);

            return;
        }

        if ($message['type'] === 'button') {
            call_user_func($this->whenQuickButtonsReplied, $message);

            return;
        }

        if ($message['type'] === 'interactive') {
            if (data_get($message, 'interactive.type') === 'list_reply') {
                call_user_func($this->whenListReplied, $message);

                return;
            }

            call_user_func($this->whenButtonsReplied, $message);

            return;
        }

        if ($message['type'] === 'system') {
            call_user_func($this->whenUserNumberChanged, $message);

            return;
        }

        call_user_func($this->onMessaged, $data);
    }

    /** @param array<string, string> $data */
    public function shouldProcess($data)
    {
        if (array_key_exists('hub', $data)) {
            $data = $data['hub'];
        }

        if (array_key_exists('mode', $data) && $data['mode'] === 'subscribe') {
            if ($this->verifyToken === $data['verify_token']) {
                return true;
            }
        }

        return false;
    }
}
