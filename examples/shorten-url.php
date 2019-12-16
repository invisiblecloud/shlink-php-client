<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

$domain = "localhost:8080";
$client = new ShlinkClient("d8080653-e702-4955-a9c7-f5637ad38c38", "http://$domain");

$request = new ShortenUrl();
$request->setUrl("http://docs.guzzlephp.org/en/stable/request-options.html");
$request->setTags(["tag1", "tag2=23"]);
$request->setCustomSlug("abcd12345");
$request->setDomain($domain); # the right domain might not be set in the server
$request->setValidUntil("2019-12-20T00:00:00Z");

$response = $client->shortenUrl($request);

echo $response;
echo "\n";
echo $response->getShortUrl();

// will print for example:
// Array
// (
//     [shortCode] => abcd12345
//     [shortUrl] => http://localhost:8080/abcd12345
//     [longUrl] => http://docs.guzzlephp.org/en/stable/request-options.html
//     [dateCreated] => 2019-12-16T18:48:39+00:00
//     [visitsCount] => 0
//     [tags] => Array
//         (
//             [0] => tag1
//             [1] => tag2=23
//         )

//     [meta] => Array
//         (
//             [validSince] => 
//             [validUntil] => 2019-12-20T00:00:00+00:00
//             [maxVisits] => 
//         )

//     [originalUrl] => http://docs.guzzlephp.org/en/stable/request-options.html
// )

// http://localhost:8080/abcd12345