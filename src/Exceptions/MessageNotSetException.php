<?php

namespace Sawirricardo\Whatsapp\Exceptions;

use InvalidArgumentException;

class MessageNotSetException extends InvalidArgumentException
{
    public static function named()
    {
        return new static('The message is not set. Set the message first');
    }
}
