<?php

namespace Sawirricardo\Whatsapp\Traits;

trait HasTypes
{
    public $type;

    public function work()
    {
        $this->type = 'WORK';

        return $this->type;
    }

    public function home()
    {
        $this->type = 'HOME';

        return $this->type;
    }
}
