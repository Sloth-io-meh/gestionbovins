FROM dunglas/frankenphp:latest

COPY . /app
COPY Caddyfile /etc/caddy/Caddyfile

RUN install-php-extensions mysqli

EXPOSE 80

ENV SERVER_NAME=:{$PORT}
