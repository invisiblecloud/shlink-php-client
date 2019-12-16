<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use InvisibleCollector\Shlink\Client\Models\Model;

class ShortenUrl extends Model
{
    public function setUrl(string $url)
    {
        $this->fields["longUrl"] = $url;

        // will make POST idempotent
        $this->fields["findIfExists"] = true;
    }

    public function setTags(array $tagsList)
    {
        $this->fields["tags"] = $tagsList;
    }

    public function setCustomSlug(string $slug)
    {
        $this->fields["customSlug"] = $slug;
    }

    public function setDomain(string $domain)
    {
        $this->fields["domain"] = $domain;
    }
}
