FROM dunglas/frankenphp:latest

COPY . /app
COPY Caddyfile /etc/caddy/Caddyfile

RUN install-php-extensions mysqli

EXPOSE 8080
