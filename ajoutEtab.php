<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $nomA = $_POST["nometab"];
  global $link;
  $req = "INSERT INTO etables(nom)VALUES('$nomA')";
  $exec = mysqli_query($link, $req);
  if ($exec) {
  $_SESSION["SuccessMessage"] = "Ajouté Avec success";
  redirect("ajoutEtab.php");
}elseif ($exec == false ) {
  $_SESSION["Message"] = "Erreur d'ajout";
  redirect("ajoutEtab.php");
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
      </div>   <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des Etables</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Ajouter un etable</div>
  <div class="panel-body">
    <form class="" action="ajoutEtab.php" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Nom Etable:</label>
          <input required  type="text" class="form-control" name="nometab" value="">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Ajouter">
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les Etables Availables/ajouté</div>
<div class="panel-body">
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
    <th>No</th>
    <th>Nom</th>
    <th>Action</th>
  </tr>
  <?php
            global $link;
            $view = "SELECT * FROM etables";
            $exec=mysqli_query($link,$view);
            $sr = 0;
            while ($datarows=mysqli_fetch_array($exec)) {
              $Id = $datarows["id_etab"];
              $nom=$datarows["nom"];
              $sr++;
              ?>
              <tr>
              <td><?php echo  $sr;?></td>
              <td><?php echo $nom; ?></td>
              <td><a href="EditEtab.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">modifier &nbsp;&nbsp;</span></a>
               <a href="DeleteEtab.php?id=<?php echo $Id; ?>"> <span class="btn btn-danger">supprimer</span></a></td>
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
