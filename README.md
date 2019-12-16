# Shlink PHP client

A HTTP+JSON client for [shlink](https://shlink.io/)

This repository uses the PSR-2 style guide.

## Instructions (dev)

### Setup

Install dependencies:

    sudo apt install php7.2-xml

### Linter

Run linter:

    php -l . # will check
    ./vendor/bin/phpcs  --standard=PSR2 src

Automatically fix lint problems:

    ./vendor/bin/phpcbf  --standard=PSR2 src

### Documentation

Generate documentation:

    ./vendor/bin/phpdoc -d ./src -t ./docs

## Examples

Checkout the examples [folder](./examples) for examples on how to use the client.
