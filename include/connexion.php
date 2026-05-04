<?php
$host     = getenv('MYSQL_HOST')     ?: 'localhost';
$user     = getenv('MYSQL_USER')     ?: 'root';
$password = getenv('MYSQL_PASSWORD') ?: '';
$database = getenv('MYSQL_DB')       ?: getenv('MYSQLDATABASE') ?: 'gestionbovins';
$port     = (int)(getenv('MYSQL_PORT') ?: 3306);

$link = mysqli_connect($host, $user, $password, $database, $port);
mysqli_set_charset($link, "utf8");
if (!$link) {
    error_log("DB Connection Error: " . mysqli_connect_error());
    error_log("Host: $host, User: $user, DB: $database, Port: $port");
    die("Database connection failed. Check logs.");
}
?>
