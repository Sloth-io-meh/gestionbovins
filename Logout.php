<?php require_once("include/Sessions.php") ;?>
<?php require_once("include/functions.php") ;?>
<?php
$_SESSION["user_Id"]=null;
session_destroy();
redirect("Login.php");
 ?>
