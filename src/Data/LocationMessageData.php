<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Jsonable;

class LocationMessageData implements Arrayable, Jsonable
{
    private $latitude;
    private $longitude;
    private $name;
    private $address;

    public function latitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function longitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    public function address($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getType()
    {
        return 'location';
    }

    public function toArray()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'name' => $this->name,
            'address' => $this->address,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
