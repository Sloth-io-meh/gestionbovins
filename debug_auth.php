<?php
require_once("include/Sessions.php");
require_once("include/connexion.php");
require_once("include/functions.php");
header('Content-Type: text/plain; charset=utf-8');

if (!$link) {
    echo "DB not connected\n";
    exit;
}

$tests = [
    ['admin@admin.test', '1234'],
    ['saadlk1997@gmail.com', '1234'],
];

foreach ($tests as $t) {
    list($u, $p) = $t;
    $res = logintempt($u, $p);
    echo "Testing: $u / $p -> ";
    if ($res) {
        echo "OK (Id: " . ($res['Id_user'] ?? 'n/a') . ")\n";
    } else {
        echo "FAIL\n";
    }
}

?>
