<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Sawirricardo\Whatsapp\Traits\HasTypes;

class AddressData implements Arrayable, Jsonable
{
    use HasTypes;

    public $street;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $countryCode;

    public function __construct($street, $city, $state, $zip, $country, $countryCode, $type = 'HOME')
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->country = $country;
        $this->countryCode = $countryCode;
        $this->type = $type;
    }

    public function toArray()
    {
        return [
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country,
            'countryCode' => $this->countryCode,
            'type' => $this->type,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
