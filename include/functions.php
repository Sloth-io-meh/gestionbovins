<?php require_once("include/Sessions.php") ?>
<?php require_once("include/connexion.php") ?>
<?php
function redirect($location){
  header("location:".$location);
  exit;
}
function logintempt($username,$password){
  global $link ;
  $req = "SELECT * FROM information where mail='$username' AND password='$password'";
  $exec = mysqli_query($link,$req);
  if ($admin = mysqli_fetch_assoc($exec)) {
    return $admin;
  }else {
    return null;
  }
}
function login(){
  if (isset($_SESSION["user_Id"])) {
    return true ;
  }
}
function veriflog(){
  if (!login()) {
    $_SESSION["ErrorMessage"]="log in required" ;
    redirect("Login.php");
  }
}






 ?>
