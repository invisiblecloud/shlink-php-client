<?php

namespace InvisibleCollector\Shlink\Client;

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;
use InvisibleCollector\Shlink\Client\Models\Responses\ShortenedUrl;

class ShlinkClient
{
    private $client;

    function __construct(string $apiKey, string $shlinkPath)
    {
        $this->client = new Client([
            'base_uri' => $shlinkPath,
            'timeout' => 2.0,
            'headers' => [
                'x-api-key' => $apiKey,
                'Accept' => 'application/json',
            ]
        ]);
    }

    function shortenUrl(ShortenUrl $model)
    {
        $response = $this->client->request('POST', '/rest/v1/short-urls', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' =>  $model->fields()
        ]);

        $body = $response->getBody();
        $arr = json_decode($body, TRUE);

        return new ShortenedUrl($arr);
    }
}
