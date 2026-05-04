<?php
$host     = getenv('MYSQL_HOST')     ?: 'localhost';
$user     = getenv('MYSQL_USER')     ?: 'root';
$password = getenv('MYSQL_PASSWORD') ?: '';
$database = getenv('MYSQLDATABASE')  ?: 'gestionbovins';
$port     = (int)(getenv('MYSQL_PORT') ?: 3306);

$link = mysqli_connect($host, $user, $password, $database, $port);
mysqli_set_charset($link, "utf8");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
