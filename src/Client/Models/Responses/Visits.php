<?php

namespace InvisibleCollector\Shlink\Client\Models\Responses;

use InvisibleCollector\Shlink\Client\Models\Model;

class Visits extends Model
{
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function getTotalVisits(): int
    {
        return sizeof($this->fields["visits"]["data"]);
    }

    public function getData(): array
    {
        return $this->fields["visits"]["data"];
    }
}
