<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;

$domain = "localhost:8080";
$client = new ShlinkClient("5ba5e99c-51c4-4f32-99ad-316320d7fac0", "http://$domain");

$request = new ShortenUrl();
$request->setUrl("http://docs.guzzlephp.org/en/stable/request-options.html");
$request->setTags(["tag1", "tag2=23"]);
// $request->setCustomSlug("abcd12345");
$request->setDomain($domain); # the right domain might not be set in the server

// $request->setValidUntil("2019-12-20T00:00:00Z");
$interval = new DateInterval('P30D'); # 30 days, check out: https://en.wikipedia.org/wiki/ISO_8601#Durations
$request->setValidUntilFromNow($interval);


$response = $client->shortenUrl($request);

echo $response;
echo "\n";
echo $response->getShortUrl();

// will print for example:  
// Array
// (
//     [shortCode] => olxn6
//     [shortUrl] => http://localhost:8080/olxn6
//     [longUrl] => http://docs.guzzlephp.org/en/stable/request-options.html
//     [dateCreated] => 2020-01-24T17:06:20+00:00
//     [visitsCount] => 0
//     [tags] => Array
//         (
//             [0] => tag1
//             [1] => tag2=23
//         )

//     [meta] => Array
//         (
//             [validSince] => 
//             [validUntil] => 2021-02-23T17:06:17+00:00
//             [maxVisits] => 
//         )

//     [originalUrl] => http://docs.guzzlephp.org/en/stable/request-options.html
// )

// http://localhost:8080/olxn6