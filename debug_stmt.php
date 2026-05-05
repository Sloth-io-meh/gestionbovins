<?php
require_once("include/connexion.php");
header('Content-Type: text/plain; charset=utf-8');

if (!$link) {
    echo "DB not connected\n";
    exit;
}

$username = 'admin@admin.test';
$password = '1234';

$sql = "SELECT Id_user, nom, prenom, adresse, ville, code, tel, mail, password FROM information WHERE mail = ? AND password = ? LIMIT 1";
$stmt = mysqli_prepare($link, $sql);
if (!$stmt) {
    echo "prepare failed: " . mysqli_error($link) . "\n";
    exit;
}

if (!mysqli_stmt_bind_param($stmt, 'ss', $username, $password)) {
    echo "bind_param failed: " . mysqli_stmt_error($stmt) . "\n";
}

if (!mysqli_stmt_execute($stmt)) {
    echo "execute failed: " . mysqli_stmt_error($stmt) . "\n";
    exit;
}

mysqli_stmt_store_result($stmt);
echo "num_rows: " . mysqli_stmt_num_rows($stmt) . "\n";

if (!mysqli_stmt_bind_result($stmt, $idUser, $nom, $prenom, $adresse, $ville, $code, $tel, $mail, $storedPassword)) {
    echo "bind_result failed\n";
}

if (mysqli_stmt_fetch($stmt)) {
    echo "fetch OK: " . ($mail ?? 'no mail') . " => " . ($storedPassword ?? 'no pass') . "\n";
} else {
    echo "fetch returned false\n";
}

mysqli_stmt_close($stmt);

?>
