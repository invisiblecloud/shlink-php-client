<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use InvisibleCollector\Shlink\Client\Models\Model;

class ShortenUrl extends Model
{
    function setUrl(string $url)
    {
        $this->fields["longUrl"] = $url;

        // will make POST idempotent
        $this->fields["findIfExists"] = true;
    }

    function setTags(array $tagsList) {
        $this->fields["tags"] = $tagsList;
    }

    function setCustomSlug(string $slug) {
        $this->fields["customSlug"] = $slug;
    }
}
