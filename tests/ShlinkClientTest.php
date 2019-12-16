<?php

use PHPUnit\Framework\TestCase;
use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

final class ShlinkClientTest extends TestCase 
{
    public function setUp(): void 
    {
        $apiKey = getenv("SHLINK_API_KEY");
        $this->host = getenv("SHLINK_HOST");
        $this->schema = "http";

        $url = "$this->schema://$this->host";
        $this->client = new ShlinkClient($apiKey, $url);
    }

    public static function generateSlug(): string 
    {
        $bytes = random_bytes(32);
        return bin2hex($bytes);
    }     

    public static function generateValidUrl(): string 
    {
        $query = ShlinkClientTest::generateSlug();
        return "https://www.google.com/search?q=$query";
    }

    public function testShortenUrl() 
    {
        $slug = ShlinkClientTest::generateSlug();
        $domain = "shlk.com";
        $validUntil = "2030-12-20T00:00:00+00:00";
        $tags = ["tag1", "tag2=23"];

        $request = new ShortenUrl();
        $request->setUrl(ShlinkClientTest::generateValidUrl());
        $request->setCustomSlug($slug);
        $request->setDomain($domain); 
        $request->setTags($tags);
        $request->setValidUntil($validUntil);

        $response = $this->client->shortenUrl($request);

        $this->assertEquals("$this->schema://$domain/$slug", $response->getShortUrl());
        $this->assertEquals($slug, $response->getShortCode());
        $this->assertEquals($validUntil, $response->getValidUntil());
        $this->assertEquals($tags, $response->getTags());
    }

}