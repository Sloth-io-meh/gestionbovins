<?php require_once("include/Sessions.php") ?>
<?php require_once("include/connexion.php") ?>
<?php
function redirect($location){
  header("location:".$location);
  exit;
}
function logintempt($username,$password){
  global $link ;
  $username = trim($username);
  $password = trim($password);

  $stmt = mysqli_prepare($link, "SELECT Id_user, nom, prenom, adresse, ville, code, tel, mail, password FROM information WHERE mail = ? AND password = ? LIMIT 1");
  if (!$stmt) {
    return null;
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($admin = mysqli_fetch_assoc($result)) {
    mysqli_stmt_close($stmt);
    return $admin;
  }

  mysqli_stmt_close($stmt);
  return null;
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
