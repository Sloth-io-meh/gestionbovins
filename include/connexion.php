<?php
function railway_env(array $names, $default = '') {
    foreach ($names as $name) {
        $value = getenv($name);
        if ($value !== false && $value !== '') {
            return $value;
        }
    }

    return $default;
}

function database_from_url($url) {
    if (!$url) {
        return '';
    }

    $parts = parse_url($url);
    if (!is_array($parts)) {
        return '';
    }

    return isset($parts['path']) ? ltrim($parts['path'], '/') : '';
}

$host = railway_env(['MYSQLHOST', 'MYSQL_HOST'], 'localhost');
$user = railway_env(['MYSQLUSER', 'MYSQL_USER'], 'root');
$password = railway_env(['MYSQLPASSWORD', 'MYSQL_PASSWORD'], '');
$port = (int) railway_env(['MYSQLPORT', 'MYSQL_PORT'], '3306');
$database = railway_env(['MYSQLDATABASE', 'MYSQL_DB', 'MYSQL_DATABASE'], '');

if ($database === '') {
    $database = database_from_url(railway_env(['MYSQL_URL'], ''));
}

$link = @mysqli_connect($host, $user, $password, '', $port);
if ($link && $database !== '') {
    if (!@mysqli_select_db($link, $database)) {
        error_log("WARNING: Could not select database '{$database}'. Using server connection only.");
    }
}

if (!$link) {
    error_log("WARNING: DB not connected. Host: {$host}, Database: {$database}");
    $link = null;
} else {
    mysqli_set_charset($link, 'utf8');
}
?>
