<?php

namespace InvisibleCollector\Shlink\Client;

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

class ShlinkClient {
    private $client;

    function __construct(string $shlinkPath, string $apiKey) {
        $this->client = new Client([
            'base_uri' => $shlinkPath,
            'timeout' => 2.0,
            'headers' => [
                'x-api-key' => $apiKey,
                'Accept' => 'application/json',
            ]
        ]);
    }

    function shortenUrl($url) {
        $response = $this->client->request('POST', '/rest/v1/short-urls', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                "longUrl" => $url
            ]
        ]);

        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        $body = $response->getBody();
        
        return $body;
    }
}










