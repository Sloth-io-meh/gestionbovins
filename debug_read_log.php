<?php
$path = __DIR__ . '/debug_login.log';
if (!file_exists($path)) {
    header('Content-Type: text/plain');
    echo "Log file not found\n";
    exit;
}
header('Content-Type: text/plain');
echo file_get_contents($path);
