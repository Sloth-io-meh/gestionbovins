<?php require_once("include/Sessions.php") ;?>
<?php require_once("include/functions.php") ;?>
<?php require_once("include/connexion.php") ;?>
<?php veriflog(); ?>
<?php

if(isset($_GET['id'])){

  $idurl = $_GET['id'];
global $link;
$req = "UPDATE bovins set id_q='1' WHERE id_bov='$idurl'";
$exec = mysqli_query($link, $req);
if ($exec) {
  $_SESSION["SuccessMessage"]= " ajouté";
    redirect("gestBovins.php");
} else {
    $_SESSION["ErrorMessage"]="Error";
      redirect("gestBovins.php");
  }
}
?>
