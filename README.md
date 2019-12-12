# Shlink PHP client

A HTTP+JSON client for [shlink](https://shlink.io/)

This repository uses the PSR-2 style guide.

## Setup (dev)



Install dependencies:

    sudo apt install php7.2-xml

Run linter:

    php -l . # will check
    ./vendor/bin/phpcs  --standard=PSR2 src

Automatically fix lint problems:

    ./vendor/bin/phpcbf  --standard=PSR2 src

## Examples

Checkout the examples [folder](./examples)