<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Sawirricardo\Whatsapp\Traits\HasTypes;

class EmailData implements Arrayable, Jsonable
{
    use HasTypes;

    public $email;
}
