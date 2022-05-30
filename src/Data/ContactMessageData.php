<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ContactMessageData implements Arrayable, Jsonable
{
    public function getType()
    {
        return 'contact';
    }
}
