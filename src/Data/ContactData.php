<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ContactData implements Arrayable, Jsonable
{
    public $addresses = [];
    public $emails = [];
    public $name;
    public $birthday;
    public $org;
    public $phones = [];

    public function toArray()
    {
        return [
            'addresses' => $this->addresses,
            'emails' => $this->emails,
            'name' => $this->name,
            'birthday' => $this->birthday,
            'org' => $this->org,
            'phones' => $this->phones,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
