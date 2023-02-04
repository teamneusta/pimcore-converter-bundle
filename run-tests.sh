#!/usr/bin/env bash

docker compose up -d
docker compose exec php composer install --ignore-platform-reqs
docker compose exec php ./wait-for-it.sh -t 30 db:3306
docker compose exec php composer tests
docker compose down -v
