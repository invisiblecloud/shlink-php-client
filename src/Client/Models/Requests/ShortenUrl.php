<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use InvisibleCollector\Shlink\Client\Models\Model;

class ShortenUrl extends Model
{
    function setUrl(string $url)
    {
        $this->fields["longUrl"] = $url;
    }
}
