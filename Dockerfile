FROM dunglas/frankenphp:latest
COPY . /app
RUN install-php-extensions mysqli
EXPOSE 8080
