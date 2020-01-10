# Shlink PHP client

A HTTP+JSON client for [shlink](https://shlink.io/).

Checkout the package on [composer](https://packagist.org/packages/invisible-collector/shlink-php-client).

To install this library run:

    composer require invisible-collector/shlink-php-client:dev-master

## Instructions

### Dev

This repository uses the PSR-2 style guide.


#### Setup

Install dependencies:

    sudo apt install php7.2-xml
    sudo apt-get install php7.2-mbstring 
    composer install

#### Linter

Run linter:

    php -l . # will check
    ./vendor/bin/phpcs  --standard=PSR2 src

Automatically fix lint problems:

    ./vendor/bin/phpcbf  --standard=PSR2 src

#### Documentation

Setup:

    composer global require jms/serializer:1.7.*
    composer global require phpdocumentor/phpdocumentor:^2.9

Generate documentation:

    ~/.config/composer/vendor/bin/phpdoc -d ./src -t ./docs


### Tests

Running tests:

```bash
docker-compose up

# in another window
SHLINK_HOST=localhost:8080 SHLINK_API_KEY=$(cat ci/api_key.txt) ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```
## Examples

Checkout the examples [folder](./examples) for examples on how to use the client.

## Notes

Check out the ci docker images [readme](./ci/README.md)