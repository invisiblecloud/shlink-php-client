# Docker image for CI

## Instructions

- Build CI build image:

```bash
DOCKER_CI_NAME=ros65536/php-shlink-ci
docker build -f Dockerfile.ci -t $DOCKER_CI_NAME .
docker login
docker push $DOCKER_CI_NAME
```

- Build shlink image with set api key:

Each time the image is created the api_key is regenerated.

```bash
DOCKER_SHLINK_NAME=ros65536/ci-shlink
docker build -f Dockerfile.shlink -t $DOCKER_SHLINK_NAME .
# copy api key from image
docker run --rm --entrypoint cat $DOCKER_SHLINK_NAME /api_key.txt > api_key.txt
docker login
docker push $DOCKER_SHLINK_NAME
```