<?php

use PHPUnit\Framework\TestCase;
use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;
use InvisibleCollector\Shlink\Client\Models\Requests\VisitsOptions;

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

    public function testShortenUrlExpirationTime() 
    {
        $slug = ShlinkClientTest::generateSlug();

        $request = new ShortenUrl();
        $request->setUrl(ShlinkClientTest::generateValidUrl());
        $request->setCustomSlug($slug);

        $interval = new DateInterval('P30D');

        $request->setValidUntilFromNow($interval);

        $response = $this->client->shortenUrl($request);

        $this->assertEquals($slug, $response->getShortCode());

        // to hour comparison precision
        $now = new DateTime();
        $expectedExpiration = $now->add($interval)
                ->setTimezone(new \DateTimeZone('UTC'))
                ->format('Y-m-d\TH');
        $actualExpiration = DateTime::createFromFormat(DateTime::ISO8601, $response->getValidUntil())
                ->setTimezone(new \DateTimeZone('UTC'))
                ->format('Y-m-d\TH');
        $this->assertEquals($expectedExpiration, $actualExpiration);
    }

    public static function simulateClick($url) {
        exec("curl --silent $url");
    }

    public function testStatistics() 
    {
        $request = new ShortenUrl();
        $request->setUrl(ShlinkClientTest::generateValidUrl());
        $response = $this->client->shortenUrl($request);

        ShlinkClientTest::simulateClick($response->getShortUrl());

        $response2 = $this->client->getStatistics($response->getShortCode());

        $this->assertEquals(1, $response2->getTotalVisits());
        $this->assertTrue(strpos($response2->getData()[0]["userAgent"], "curl/") !== false);
    }

    public function testStatisticsEmpty() 
    {
        $request = new ShortenUrl();
        $request->setUrl(ShlinkClientTest::generateValidUrl());
        $response = $this->client->shortenUrl($request);

        ShlinkClientTest::simulateClick($response->getShortUrl());

        $options = new VisitsOptions();
        $options->setStartDate("1-1-2001");
        $options->setEndDate("31-12-2001");
        $response2 = $this->client->getStatistics($response->getShortCode(), $options);

        // no visits set in the past
        $this->assertEquals(0, $response2->getTotalVisits());
    }

}