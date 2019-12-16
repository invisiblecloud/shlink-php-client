<?php

use PHPUnit\Framework\TestCase;
use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

final class ShlinkClientTest extends TestCase 
{
    public function setUp(): void 
    {
        $host = getenv("SHLINK_HOST");
        $apiKey = getenv("SHLINK_API_KEY");

        $this->client = new ShlinkClient($apiKey, $host);
        echo "$host $apiKey";
    }

    public function testHello() 
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }

}