<?php

namespace Sawirricardo\Whatsapp\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class SectionData implements Arrayable, Jsonable
{
    /** @var string */
    private $title;

    /** @var array<int, RowData> */
    private $rows;

    public function addRow($row)
    {
        $this->rows[] = $row;

        return $this;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'rows' => array_map(function (RowData $row) {
                return $row->toArray();
            }, $this->rows),
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
