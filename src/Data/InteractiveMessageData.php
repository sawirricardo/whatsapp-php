<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class InteractiveMessageData implements Arrayable, Jsonable
{
    public function getType()
    {
        return 'interactive';
    }
}
