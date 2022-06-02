<?php

namespace Sawirricardo\Whatsapp;

use GuzzleHttp\ClientInterface;
use Sawirricardo\Whatsapp\Data\ResponseData;
use Sawirricardo\Whatsapp\Exceptions\FailedConnectionException;
use Sawirricardo\Whatsapp\Exceptions\MessageNotSetException;
use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class Whatsapp
{
    /** @var string */
    private $token;

    /** @var string */
    private $phoneId;

    /** @var string */
    private $to;

    /** @var HasMessageData|null */
    private $message;

    /** @var ClientInterface */
    private $client;

    /** @param ?ClientInterface $client */
    public function __construct($client = null)
    {
        $this->client = $client ?? new \GuzzleHttp\Client();
    }

    public static function make($client = null)
    {
        return new static($client);
    }

    public function phoneId($phoneId)
    {
        $this->phoneId = $phoneId;

        return $this;
    }

    public function token($token)
    {
        $this->token = $token;

        return $this;
    }

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    /** @param HasMessageData $message */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /** @return ?ResponseData */
    public function send()
    {
        if (is_null($this->message)) {
            throw new MessageNotSetException();
        }

        $response = $this->client->request('POST', $this->defineBaseUrl() . '/messages', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'recipient_type' => 'individual',
                'to' => $this->to,
                'type' => $this->message->getType(),
                $this->message->getType() => $this->message->toArray(),
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw FailedConnectionException::couldNotConnect();
        }

        return ResponseData::fromArray(json_decode($response->getBody(), true));
    }

    public function markAsRead($messageId)
    {
        $response = $this->client->request('POST', $this->defineBaseUrl() . '/messages', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'status' => 'read',
                'message_id' => $messageId,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw FailedConnectionException::couldNotConnect();
        }
    }

    protected function defineBaseUrl()
    {
        return 'https://graph.facebook.com/v13.0/' . $this->phoneId;
    }
}
