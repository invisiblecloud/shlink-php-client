<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

$client = new ShlinkClient("4319f3f9-8133-4cd5-ac9b-91f6bf910e63", "http://localhost:8080");

$request = new ShortenUrl();
$request->setUrl("https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle");
$request->setTags(["tag1", "tag2=23"]);
$request->setCustomSlug("abcd1234");

$response = $client->shortenUrl($request);

echo $response;
echo "\n";
echo $response->getShortUrl();

// will print for example:
// Array
// (
//     [shortCode] => abcd1234
//     [shortUrl] => https://localhost/abcd1234
//     [longUrl] => https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle
//     [dateCreated] => 2019-12-12T08:50:37+00:00
//     [visitsCount] => 0   
//     [tags] => Array
//         (
//             [0] => tag1
//             [1] => tag2=23
//         )

//     [meta] => Array
//         (
//             [validSince] => 
//             [validUntil] => 
//             [maxVisits] => 
//         )

//     [originalUrl] => https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle
// )

// https://localhost/abcd1234