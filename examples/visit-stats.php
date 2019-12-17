<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;
use InvisibleCollector\Shlink\Client\Models\Requests\ShortenUrl;
use InvisibleCollector\Shlink\Client\Models\Requests\VisitsOptions;

$domain = "localhost:8080";
$client = new ShlinkClient("d8080653-e702-4955-a9c7-f5637ad38c38", "http://$domain");

// create shotlink to get shortCode
$request = new ShortenUrl();
$request->setUrl("https://www.google.com/search?client=ubuntu&channel=fs&q=php+execute+shell+command&ie=utf-8&oe=utf-8");
$request->setDomain($domain);
$response = $client->shortenUrl($request);

// simulate click
$shortUrl = $response->getShortUrl();
exec("curl --silent -L $shortUrl");

// get link visits statistics
$options = new VisitsOptions();
$options->setStartDate("1-1-2019");
$options->setEndDate("31-12-2020");
$response2 = $client->getStatistics($response->getShortCode(), $options);

echo $response2->getTotalVisits();
echo "\n";
print_r($response2->getData());

// example output 
// 1
// Array
// (
//     [0] => Array
//         (
//             [referer] => 
//             [date] => 2019-12-16T18:31:49+00:00
//             [userAgent] => curl/7.58.0
//             [visitLocation] => Array
//                 (
//                     [countryCode] => 
//                     [countryName] => 
//                     [regionName] => 
//                     [cityName] => 
//                     [latitude] => 0
//                     [longitude] => 0
//                     [timezone] => 
//                 )

//             [remoteAddr] => 
//         )

// )