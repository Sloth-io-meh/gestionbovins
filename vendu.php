<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $dv = $_POST["datevente"];
  $lv = $_POST["lieuvente"];
  $pv = $_POST["prixvente"];
  $pdv = $_POST["poidvente"];
  $v = $_POST["vendu"];
  global $link;
  $editing = $_GET['Edit'];
  $req = "UPDATE bovins set datevente='$dv',lieuvente='$lv',prixavente='$pv',poidvente='$pdv',vendu='$v'where id_bov='$editing' ";
  $exec = mysqli_query($link, $req);
  if ($exec) {
  $_SESSION["SuccessMessage"] = "Modifié Avec success";
  redirect("gestBovins.php");
}elseif ($exec == false ) {
  $_SESSION["Message"] = "Erreur de modification";
  redirect("gestBovins.php");
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
          <h1>Gestion Des Bovins</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Vendu</div>
  <div class="panel-body">
    <?php
$searching= $_GET['Edit'];
global $link;
$req="Select * From bovins where id_bov ='$searching' ";
$exec=mysqli_query($link, $req);
while ($datarows = mysqli_fetch_array($exec)) {
  $Id = $datarows["id_bov"];
}
?>
    <form class="" action="vendu.php?Edit=<?php echo $searching ; ?>" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Date de vente:</label>
          <input required  type="date" class="form-control" name="datevente" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Lieu de vente:</label>
          <input required  type="text" class="form-control" name="lieuvente" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Prix de vente:</label>
          <input required  type="number" class="form-control" name="prixvente" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Poid de vente:</label>
          <input required  type="number" class="form-control" name="poidvente" value="">
          <input type="hidden" name="vendu" value="1">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Modifier">
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
