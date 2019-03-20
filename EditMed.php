<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $nom = $_POST["nomMed"];
  $desc = $_POST["describeMed"];
  $q = $_POST["quantite"];
  $p = $_POST["prix"];
  $dateA = $_POST["dateA"];
  $dateX = $_POST["dateX"];
  global $link;
  $editing = $_GET['Edit'];
  $req = "UPDATE meds set libelle='$nom',description='$desc',quantite_med='$q',prix_med='$p',dateachat='$dateA',dateexp_med='$dateX'where id_med='$editing' ";
  $exec = mysqli_query($link, $req);
  if ($exec) {
  $_SESSION["SuccessMessage"] = "Modifié Avec success";
  redirect("ajoutMed.php");
}elseif ($exec == false ) {
  $_SESSION["Message"] = "Erreur de modification";
  redirect("ajoutMed.php");
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
            <li class="active"><a href="ajoutMed.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Stock Medicaments</a></li>
            <li class=""><a href="gestBovins.php"><span class="glyphicon glyphicon-cog"></span>&nbsp; Gestion des bovins</a></li>
            <li class=""><a href="ajoutTrans.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Transporteur/Vehicules</a></li>
            <li class=""><a href="ajoutVisite.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Visites</a></li>
            <li class=""><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Gestion Utilisateur</a></li>
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
        </ul>
      </div>  <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des Medicaments</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Modifier un Medicament</div>
  <div class="panel-body">
    <?php
$searching= $_GET['Edit'];
global $link;
$req="Select * From meds where id_med ='$searching' ";
$exec=mysqli_query($link, $req);
while ($datarows = mysqli_fetch_array($exec)) {
  $Id = $datarows["id_med"];
  $libelle=$datarows["libelle"];
  $desc = $datarows["description"];
  $q = $datarows["quantite_med"];
  $p = $datarows["prix_med"];
  $dateA = $datarows["dateachat"];
  $dateX = $datarows["dateexp_med"];
}
?>
    <form class="" action="EditMed.php?Edit=<?php echo $searching ; ?>" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Nom Medicament:</label>
          <input required  type="text" class="form-control" name="nomMed" value="<?php echo $libelle; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Description Medicament:</label>
          <textarea class="form-control" name="describeMed" value=""required><?php echo $desc; ?></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="type">Quantité:</label>
          <input required  type="number" class="form-control" name="quantite" value="<?php echo $q; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="type">prix:</label>
          <input required  type="text" class="form-control" name="prix" value="<?php echo $p; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Date d'achat:</label>
          <input required  type="date" class="form-control" name="dateA" value="<?php echo $dateA; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Date d'expiration:</label>
          <input required  type="date" class="form-control" name="dateX" value="<?php echo $dateX; ?>">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Modifier">
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les Medicaments Availables/ajouté</div>
<div class="panel-body">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <tr>
      <th>No</th>
      <th>Libelle</th>
      <th>Description</th>
      <th>Quantité</th>
      <th>Prix</th>
      <th>Date d'achat</th>
      <th>Date d'Expiration</th>
      <th>Action</th>
    </tr>
    <?php
              global $link;
              $view = "SELECT * FROM meds";
              $exec=mysqli_query($link,$view);
              $sr = 0;
              while ($datarows=mysqli_fetch_array($exec)) {
                $Id = $datarows["id_med"];
                $libelle=$datarows["libelle"];
                $desc = $datarows["description"];
                $q = $datarows["quantite_med"];
                $p = $datarows["prix_med"];
                $dateA = $datarows["dateachat"];
                $dateX = $datarows["dateexp_med"];
                $sr++;
                ?>
                <tr>
                <td><?php echo  $sr;?></td>
                <td><?php echo $libelle; ?></td>
                <td><?php echo $desc; ?></td>
                <td><?php echo $q; ?></td>
                <td><?php echo " ".$p." DH"; ?></td>
                <td><?php echo $dateA; ?></td>
                <td><?php echo $dateX; ?></td>
                <td><a href="EditMed.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">modifier &nbsp;&nbsp;</span></a>
                 <a href="DeleteMed.php?id=<?php echo $Id; ?>"> <span class="btn btn-danger">supprimer</span></a></td>
     </tr>
   <?php } ?>
    </table>
</div>
</div>
</div>

        </div>
      </div>
    </div>
  </body>
  <footer></footer>
</html>
<?php ?>
