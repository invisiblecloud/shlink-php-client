<?php

namespace InvisibleCollector\Shlink\Client\Models\Requests;

use DateTime;
use DateInterval;
use InvisibleCollector\Shlink\Client\Models\Model;

/**
 * Model for shortening urls
 */
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

    /**
     * Set the domain of the short link returned by the server.
     * Useful when the server doesn't have the correct domain set.
     */
    public function setDomain(string $domain)
    {
        $this->fields["domain"] = $domain;
    }

    /**
     * @param string $isoDate must be in full ISO-8601 including time and timezone.
     * Example that will work: "2019-12-20T00:00:00Z", example that will not work: "2019-12-20T00:00:00"
     */
    public function setValidUntil(string $isoDate)
    {
        $this->fields["validUntil"] = $isoDate;
    }

    /**
     * Overload for
     * @see ShortenUrl::setValidUntil
     *
     * @param interval amount of time to add to current time to set short url expiration time.
     */
    public function setValidUntilFromNow(DateInterval $interval)
    {
        $now = new DateTime();

        $isoTime = $now->add($interval)
                ->setTimezone(new \DateTimeZone('UTC'))
                ->format('Y-m-d\TH:i:s\Z');

        $this->setValidUntil($isoTime);
    }
}
