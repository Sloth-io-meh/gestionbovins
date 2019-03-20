<?php require_once("include/Sessions.php") ;?>
<?php require_once("include/functions.php") ;?>
<?php require_once("include/connexion.php") ;?>
<?php veriflog();?>
<?php

if(isset($_GET['id'])){

  $idurl = $_GET['id'];
global $link;
$req = "DELETE FROM veto WHERE id_etab='$idurl'";
$exec = mysqli_query($link, $req);
if ($exec) {
  $_SESSION["SuccessMessage"]= " deleted successfully";
    redirect("ajoutVeto.php");
} else {
    $_SESSION["ErrorMessage"]="Error de suppression";
      redirect("ajoutVeto.php");
  }
}
?>
