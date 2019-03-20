<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $descr = $_POST["desciption"];
  $dv =  $_POST["dateV"];
  $pv = $_POST["Price"];
  $idb = $_POST["id_bov"];
  $idv = $_POST["id_vet"];
  $poid = $_POST["poid"];
  global $link;
  $req = "INSERT INTO visites(description_v	,datepres	,prix_pres	,id_bov	,id_vet)VALUES('$descr','$dv','$pv','$idb','$idv')";
  $exec = mysqli_query($link, $req);
  if ($exec) {
      $req1 = "UPDATE bovins set poidAct ='$poid' where id_bov='$idb'";
      $exec1= mysqli_query($link, $req1);
  $_SESSION["SuccessMessage"] = "Ajouté Avec success";
  redirect("ajoutVisite.php");
}elseif (!$exec) {
  $_SESSION["Message"] = "Erreur d'ajout";
  redirect("ajoutVisite.php");
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
            <li class=""><a href="gestBovins.php"><span class="glyphicon glyphicon-cog"></span>&nbsp; Gestion des bovins</a></li>
            <li class=""><a href="ajoutTrans.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Transporteur/Vehicules</a></li>
            <li class="active"><a href="ajoutVisite.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Gestion Visites</a></li>
            <li class=""><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Gestion Utilisateur</a></li>
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
        </ul>
      </div>   <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des Visites</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Ajouter une Visite</div>
  <div class="panel-body">
    <form class="" action="ajoutVisite.php" method="post">
      <fieldset>
        <div class="form-group col-md-6">
          <label for="type">Desciption Visite:</label>
          <input required  type="text" class="form-control" name="desciption" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Poid Actuelle:</label>
          <input required  type="number" step="any" class="form-control" name="poid" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Date:</label>
          <input required  type="date" class="form-control" name="dateV" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Prix:</label>
          <input required  type="number" step="any" class="form-control" name="Price" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Veau Concernée:</label>
          <select class="form-control" name="id_bov">
            <?php
                    global $link;
                    $view = "SELECT * FROM bovins ";
                    $exec=mysqli_query($link,$view);
                    while ($datarows=mysqli_fetch_array($exec)) {
                      $Id=$datarows["id_bov"];
                      $nom=$datarows["race"];

                      ?>
                      <option value="<?php echo $Id; ?>" > <?php echo $Id." -- ".$nom;  ?></option>
                    <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="type">Vetirinaire Operant:</label>
          <select class="form-control" name="id_vet">
            <?php
                    global $link;
                    $view = "SELECT * FROM veto ";
                    $exec=mysqli_query($link,$view);
                    while ($datarows=mysqli_fetch_array($exec)) {
                      $Id=$datarows["id_vet"];
                      $nom=$datarows["nom_vet"];
                      $prenom=$datarows["prenom_vet"];
                      ?>
                      <option value="<?php echo $Id; ?>" > <?php echo $nom." ".$prenom;  ?></option>
                    <?php } ?>
          </select>
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Ajouter"> <br>
        <a href="ajoutVeto.php"><span class="btn btn-warning btn-block">Ajouter un Veterinaire &nbsp;&nbsp;</span></a>
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les Visites </div>
<div class="panel-body">
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
    <th>No</th>
    <th>Desciption</th>
    <th>Date</th>
    <th>Prix Visite</th>
    <th>Bovin</th>
    <th>Vetirinaire Operant</th>
    <th>Action</th>
  </tr>
  <?php
            global $link;
            $view = "SELECT * FROM visites,veto,bovins where visites.id_bov=bovins.id_bov and visites.id_vet=veto.id_vet";
            $exec=mysqli_query($link,$view);
            $sr = 0;
            while ($datarows=mysqli_fetch_array($exec)) {
              $Id = $datarows["id_pres"];
              $nom=$datarows["description_v"];
              $dv=$datarows["datepres"];
              $pv=$datarows["prix_pres"];
              $idb=$datarows["id_bov"];
              $race=$datarows["race"];
              $idv=$datarows["id_vet"];
              $nomV=$datarows["nom_vet"];
              $prenomV=$datarows["prenom_vet"];
              $sr++;
              ?>
              <tr>
              <td><?php echo $sr;?></td>
              <td><?php echo $nom; ?></td>
              <td><?php echo $dv; ?></td>
              <td><?php echo $pv; ?></td>
              <td><?php echo $idb." ".$race; ?></td>
              <td><?php echo $nomV." ".$prenomV; ?></td>
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
