<?php

namespace InvisibleCollector\Shlink\Client\Models;

class Model
{
    protected $fields = [];

    // shouldn't be used
    public function fields()
    {
        return $this->fields;
    }

    public function __toString()
    {
        return print_r($this->fields, true);
    }
}
