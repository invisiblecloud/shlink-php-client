<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;

$client = new ShlinkClient("http://localhost:8080", "4319f3f9-8133-4cd5-ac9b-91f6bf910e63");
echo $client->shortenUrl("https://stackoverflow.com/questions/17766626/how-to-set-default-header-in-guzzle");

