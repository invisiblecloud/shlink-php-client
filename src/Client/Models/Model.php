<?php

namespace InvisibleCollector\Shlink\Client\Models;

class Model
{
    protected $fields = [];

    /**
     * shouldn't be used
     *
     * @internal
     */
    public function fields(): array
    {
        return $this->fields;
    }

    public function __toString()
    {
        return print_r($this->fields, true);
    }
}
