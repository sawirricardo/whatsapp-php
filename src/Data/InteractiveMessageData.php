<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

abstract class InteractiveMessageData implements HasMessageData
{
    public function getType()
    {
        return 'interactive';
    }
}
