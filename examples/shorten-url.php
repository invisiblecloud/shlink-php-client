<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

$client = new ShlinkClient("http://localhost:8080", "4319f3f9-8133-4cd5-ac9b-91f6bf910e63");

$request = new ShortenUrl();
$request->setUrl("https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle");
$response = $client->shortenUrl($request);

echo $response;
echo "\n";
echo $response->getShortUrl();
