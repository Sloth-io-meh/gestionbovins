FROM dunglas/frankenphp:latest

COPY . /app
COPY Caddyfile /etc/caddy/Caddyfile

RUN install-php-extensions mysqli

EXPOSE 80

CMD ["caddy", "run", "--config", "/etc/caddy/Caddyfile", "--adapter", "caddyfile"]
