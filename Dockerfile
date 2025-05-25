# FROM php:7.4-bullseye
FROM php:8.4-bookworm

COPY . /app

WORKDIR /app

CMD [ "php", "sample.php" ]
