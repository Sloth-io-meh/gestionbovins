<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $lib = $_POST["lib"];
  $qte = $_POST["qte"];
  $idb = $_POST["idb"];
  $ids = $_POST["ids"];
  global $link;
  $req = "INSERT into medicsconsumed(libelle_m,quantite_m,id_bov) VALUES ('$lib','$qte','$idb') ";

  $exec = mysqli_query($link, $req);

  if ($exec) {
      $req1 = "UPDATE meds set quantite_med=quantite_med-'$qte' where id_med='$ids'";
      $exec1 = mysqli_query($link, $req1);
      if ($exec1) {
        $_SESSION["SuccessMessage"] = "Modifié Avec success";
        redirect("GestBovins.php");
      }

}elseif (!$exec || !$exec1) {
  $_SESSION["Message"] = "Erreur d'ajout";
  redirect("GestBovins.php");
}
}
} catch (\Exception $e) {
  echo $e;
}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 ">
          <ul id="Sidemenu" class="nav nav-pills nav-stacked">
          <li> <div class="">
                <h1 class="RM-txt"> GestionBovins </h1>
                <div class="user-panel img-wrap">
                  <img class="img-responsive" alt="cow" src="img/cow.png">
                </div>
            </div></li>
            <li class=""><a href="ajoutStock.php"><span class="glyphicon glyphicon-th"></span>&nbsp;Stock Alimentation</a></li>
            <li class=""><a href="ajoutMed.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Stock Medicaments</a></li>
            <li class="active"><a href="gestBovins.php"><span class="glyphicon glyphicon-cog"></span>&nbsp; Gestion des bovins</a></li>
            <li class=""><a href="ajoutTrans.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Transporteur/Vehicules</a></li>
            <li class=""><a href="ajoutVisite.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Visites</a></li>
            <li class=""><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Gestion Utilisateur</a></li>
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
        </ul>
      </div>  <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des Etables</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Donner Medicaments</div>
  <div class="panel-body">
    <?php
$searching= $_GET['Edit'];
global $link;
$req="Select * From bovins where id_bov ='$searching' ";
$exec=mysqli_query($link, $req);
while ($datarows = mysqli_fetch_array($exec)) {
$idblook =$datarows['id_bov'];
}
?>
    <form class="" action="DonnerMed.php?Edit=<?php echo $searching; ?>" method="post">
      <fieldset>
        <input type="hidden" name="idb" value="<?php echo $idblook; ?>">
        <div class="form-group col-md-6">
          <label for="type">Libelle:</label>
          <select class="form-control" name="lib">
            <?php
                    global $link;
                    $view = "SELECT * FROM meds ";
                    $exec=mysqli_query($link,$view);
                    while ($datarows=mysqli_fetch_array($exec)) {
                      $Id=$datarows["id_med"];
                      $nom=$datarows["libelle"];

                      ?>
                      <option value="<?php echo $nom; ?>" > <?php echo $nom;  ?></option>
                      <input type="hidden" name="ids" value="<?php echo $Id; ?>">
                    <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="type">Quantité:</label>
          <input required  type="number" step="any" class="form-control" name="qte" value="">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Nourrir">
      </fieldset>
    </form>
  </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <footer></footer>
</html>
<?php ?>
