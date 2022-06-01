<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class NameData implements Arrayable, Jsonable
{
    public $formattedName;
    public $firstName;
    public $lastName;
    public $middleName;
    public $suffix;
    public $prefix;

    public function __construct($formattedName, $firstName, $lastName, $middleName, $suffix, $prefix)
    {
        $this->formattedName = $formattedName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleName = $middleName;
        $this->suffix = $suffix;
        $this->prefix = $prefix;
    }

    public static function make(
        $formattedName,
        $firstName = null,
        $lastName = null,
        $middleName = null,
        $suffix = null,
        $prefix = null
    ) {
        return new static($formattedName, $firstName, $lastName, $middleName, $suffix, $prefix);
    }

    public function toArray()
    {
        return [
            'formatted_name' => $this->formattedName,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'middle_name' => $this->middleName,
            'suffix' => $this->suffix,
            'prefix' => $this->prefix,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
