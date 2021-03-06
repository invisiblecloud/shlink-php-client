<?php

namespace InvisibleCollector\Shlink\Client\Models\Responses;

use InvisibleCollector\Shlink\Client\Models\Model;

/**
 * The visits for a short url
 */
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

    /**
     * The list of visits.
     */
    public function getData(): array
    {
        return $this->fields["visits"]["data"];
    }
}
