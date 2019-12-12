<?php

namespace InvisibleCollector\Shlink\Client\Models\Responses;

use InvisibleCollector\Shlink\Client\Models\Model;

class ShortenedUrl extends Model {

    function __construct($fields) {
        $this->fields = $fields;
    }

    function getShortUrl(): string {
        return $this->fields["shortUrl"];
    }

    function getShortCode(): string {
        return $this->fields["shortCode"];
    }

    function getTags(): array {
        return $this->fields["tags"];
    }
}
