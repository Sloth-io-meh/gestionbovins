<?php
require_once(__DIR__ . '/include/Sessions.php');
header('Content-Type: text/plain');
session_start();
echo "session_id: " . session_id() . "\n";
echo "session content:\n" . json_encode($_SESSION) . "\n";
