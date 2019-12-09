<?php

namespace InvisibleCollector\Shlink\Client\Models;

class Model {
    protected $fields = [];

    function fields() {
        return $this->fields;
    }

    public function __toString() {
        return print_r($this->fields, TRUE);
    }
}