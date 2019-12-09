<?php 
include_once __DIR__ . '/../vendor/autoload.php';

use InvisibleCollector\Shlink\Client\ShlinkClient;

$client = new ShlinkClient("ello");
$client->hi();

