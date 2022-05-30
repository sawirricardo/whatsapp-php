<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class TemplateMessageData implements Arrayable, Jsonable
{
    private $name;
    private $languageCode;
}
