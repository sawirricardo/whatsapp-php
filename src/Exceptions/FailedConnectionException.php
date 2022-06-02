<?php

namespace Sawirricardo\Whatsapp\Exceptions;

use Exception;

class FailedConnectionException extends Exception
{
    public static function couldNotConnect()
    {
        return new static('Could not connect to WhatsApp servers.');
    }

    public static function serviceReturnedError(string $message)
    {
        return new static("Google timezone failed because `{$message}`");
    }
}
