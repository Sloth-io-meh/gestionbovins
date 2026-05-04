FROM dunglas/frankenphp:latest

COPY . /app

RUN install-php-extensions mysqli

ENV SERVER_NAME=:80

EXPOSE 80
