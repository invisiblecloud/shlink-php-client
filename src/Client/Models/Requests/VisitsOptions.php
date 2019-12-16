<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use InvisibleCollector\Shlink\Client\Models\Model;

class VisitsOptions extends Model
{
    public function setStartDate(string $date)
    {
        $this->fields["startDate"] = $date;
    }

    public function setEndDate(string $date)
    {
        $this->fields["endDate"] = $date;
    }
}
