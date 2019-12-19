# Docker image for CI

## Instructions

```bash
DOCKER_NAME=ros65536/php-shlink-ci
docker build -t $DOCKER_NAME .
docker login
docker push $DOCKER_NAME
```