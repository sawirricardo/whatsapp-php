<?php

namespace Sawirricardo\Whatsapp\Connectors;

use Illuminate\Support\Facades\Http;

class MessageConnector
{
    protected $phoneId;
    protected $token;

    public function __construct($token, $phoneId)
    {
        $this->phoneId = $phoneId;
        $this->token = $token;
    }

    public function defineBaseUrl()
    {
        return 'https://graph.facebook.com/v13.0/' . $this->phoneId;
    }

    public function send($request)
    {
        Http::withToken($this->token)
            ->post($this->defineBaseUrl() . $request->defineEndpoint(), $request->getBody());
    }
}
