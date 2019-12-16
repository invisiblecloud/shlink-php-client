<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use InvisibleCollector\Shlink\Client\Models\Model;

class VisitsOptions extends Model
{
    /**
     * @param string $date visits start date. format: DD-MM-YYYY     
     */
    public function setStartDate(string $date)
    {
        $this->fields["startDate"] = $date;
    }

    /**
     * @param string $date visits end date. format: DD-MM-YYYY     
     */
    public function setEndDate(string $date)
    {
        $this->fields["endDate"] = $date;
    }
}
