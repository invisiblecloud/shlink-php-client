<?php

namespace InvisibleCollector\Shlink\Client;

use GuzzleHttp\Client;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;
use InvisibleCollector\Shlink\Client\Models\Requests\VisitsOptions;
use InvisibleCollector\Shlink\Client\Models\Responses\ShortenedUrl;
use InvisibleCollector\Shlink\Client\Models\Responses\Visits;

/**
 * An HTTP+JSON client for shlink link shortener.
 */
class ShlinkClient
{
    private $client;

    public function __construct(string $apiKey, string $shlinkPath)
    {
        $this->client = new Client([
            'base_uri' => $shlinkPath,
            'timeout' => 60.0,
            'headers' => [
                'x-api-key' => $apiKey,
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function shortenUrl(ShortenUrl $model): ShortenedUrl
    {
        $response = $this->client->request('POST', '/rest/v1/short-urls', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' =>  $model->fields()
        ]);

        $body = $response->getBody();
        $arr = json_decode($body, true);

        return new ShortenedUrl($arr);
    }

    public function getStatistics(string $shortCode, VisitsOptions $options = null): Visits
    {
        // by default no options
        if ($options === null) {
            $options = new VisitsOptions();
        }

        $response = $this->client->request('GET', "/rest/v1/short-urls/$shortCode/visits", [
            'query' =>  $options->fields()
        ]);

        $body = $response->getBody();
        $arr = json_decode($body, true);

        return new Visits($arr);
    }
}
