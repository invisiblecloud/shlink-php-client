<?php

namespace InvisibleCollector\Shlink\Client;

class ShlinkClient {
    private $path;

    function __construct(string $path) {
        $this->path = $path;
    }

    function hi() {
        $p = $this->path;
        echo "$p";
    }
}










