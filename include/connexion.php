<?php
$host     = getenv('MYSQL_HOST')     ?: 'localhost';
$user     = getenv('MYSQL_USER')     ?: 'root';
$password = getenv('MYSQL_PASSWORD') ?: '';
$database = getenv('MYSQL_DB')       ?: getenv('MYSQLDATABASE') ?: 'gestionbovins';
$port     = (int)(getenv('MYSQL_PORT') ?: 3306);

$link = @mysqli_connect($host, $user, $password, $database, $port);
if (!$link) {
    // Log but don't die - let the app start
    error_log("WARNING: DB not connected. Host: $host, DB: $database");
    // Create a dummy connection object to prevent errors
    $link = null;
} else {
    mysqli_set_charset($link, "utf8");
}
?>
