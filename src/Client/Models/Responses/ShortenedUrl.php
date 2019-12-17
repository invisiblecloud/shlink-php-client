<?php

namespace InvisibleCollector\Shlink\Client\Models\Responses;

use InvisibleCollector\Shlink\Client\Models\Model;

class ShortenedUrl extends Model
{
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function getShortUrl(): string
    {
        return $this->fields["shortUrl"];
    }

    public function getShortCode(): string
    {
        return $this->fields["shortCode"];
    }

    public function getTags(): array
    {
        return $this->fields["tags"];
    }

    public function getValidUntil(): string
    {
        return $this->fields["meta"]["validUntil"];
    }
}
