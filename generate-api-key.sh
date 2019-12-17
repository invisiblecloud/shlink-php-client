# /bin/sh

DOCKER_ID=$(docker ps | grep shlinkio/shlink | awk '{print $1}')
docker exec -it $DOCKER_ID sh -c "if [ \$(shlink api-key:list | wc -l) = 3 ]; then shlink api-key:generate; fi"
echo $(docker exec -it $DOCKER_ID sh -c "shlink api-key:list" | head -4 | tail -1 | awk '{print $2}' | sed -r "s/\x1B\[([0-9]{1,2}(;[0-9]{1,2})?)?[mGK]//g")