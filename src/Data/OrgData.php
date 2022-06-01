<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class OrgData implements Arrayable, Jsonable
{
    public $company;
    public $department;
    public $title;

    public function __construct($company, $department, $title)
    {
        $this->company = $company;
        $this->department = $department;
        $this->title = $title;
    }

    public static function make(
        $company,
        $department,
        $title
    ) {
        return new static($company, $department, $title);
    }

    public function toArray()
    {
        return [
            'company' => $this->company,
            'department' => $this->department,
            'title' => $this->title,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
