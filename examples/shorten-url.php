<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

$client = new ShlinkClient("4319f3f9-8133-4cd5-ac9b-91f6bf910e63", "http://localhost:8080");

$request = new ShortenUrl();
$request->setUrl("https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle");
$response = $client->shortenUrl($request);

echo $response;
echo "\n";
echo $response->getShortUrl();

// will print for example
// Array
// (
//     [shortCode] => zGR8u
//     [shortUrl] => https://localhost/zGR8u
//     [longUrl] => https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle
//     [dateCreated] => 2019-12-09T19:34:35+00:00
//     [visitsCount] => 0
//     [tags] => Array
//         (
//         )

//     [meta] => Array
//         (
//             [validSince] => 
//             [validUntil] => 
//             [maxVisits] => 
//         )

//     [originalUrl] => https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle
// )

// https://localhost/zGR8u