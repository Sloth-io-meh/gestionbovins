<?php
require_once("include/connexion.php");
header('Content-Type: text/plain; charset=utf-8');

if (!$link) {
    echo "DB not connected\n";
    exit;
}

echo "Connected to MySQL server.\n";

$res = mysqli_query($link, "SHOW TABLES");
if (!$res) {
    echo "Could not list tables: " . mysqli_error($link) . "\n";
    exit;
}

echo "Tables:\n";
while ($row = mysqli_fetch_row($res)) {
    echo " - " . $row[0] . "\n";
}

echo "\nChecking 'information' table:\n";
$check = @mysqli_query($link, "SELECT mail, password FROM information LIMIT 100");
if (!$check) {
    echo " - 'information' table missing or query failed: " . mysqli_error($link) . "\n";
} else {
    $count = mysqli_num_rows($check);
    echo " - rows: $count\n";
    while ($r = mysqli_fetch_assoc($check)) {
        echo "   * " . ($r['mail'] ?? '') . " => " . ($r['password'] ?? '') . "\n";
    }
}

?>
