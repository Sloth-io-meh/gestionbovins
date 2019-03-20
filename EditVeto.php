<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $cin = $_POST["cin"];
  $nom = $_POST["nom"];
  $pre = $_POST["prenom"];
  $tel = $_POST["tel"];
  global $link;
  $editing = $_GET['Edit'];
  $req = "UPDATE veto set nom_vet='$nom',prenom_vet='$pre',tel_vet='$tel' where id_vet='$editing' ";
  $exec = mysqli_query($link, $req);
  if ($exec) {
  $_SESSION["SuccessMessage"] = "Modifié Avec success";
  redirect("ajoutVeto.php");
}elseif ($exec == false ) {
  $_SESSION["Message"] = "Erreur d'ajout";
  redirect("ajoutVeto.php");
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
              <div class="panel-heading">Modifier un Veterinaire</div>
  <div class="panel-body">
    <?php
$searching= $_GET['Edit'];
global $link;
$req="Select * From veto where id_vet ='$searching' ";
$exec=mysqli_query($link, $req);
while ($datarows = mysqli_fetch_array($exec)) {
$cinupdate =$datarows['id_vet'];
$nomupdate =$datarows['nom_vet'];
$prenomupdate =$datarows['prenom_vet'];
$telupdate =$datarows['tel_vet'];
}
?>
    <form class="" action="EditVeto.php?Edit=<?php echo $searching ; ?>" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Cin:</label>
          <input required  type="text" class="form-control" name="cin" value=" <?php echo $cinupdate; ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label for="type">Nom:</label>
          <input required  type="text" class="form-control" name="nom" value=" <?php echo $nomupdate; ?> ">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Prenom:</label>
          <input required  type="text" class="form-control" name="prenom" value=" <?php echo $prenomupdate; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Tel:</label>
          <input required  type="text" class="form-control" name="tel" value=" <?php echo $telupdate; ?>">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Modifier">
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les Veterinaire Availables Pour Contact</div>
  <div class="panel-body">
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
    <th>No</th>
    <th>CIN</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Tel</th>
    <th>Action</th>
  </tr>
  <?php
            global $link;
            $view = "SELECT * FROM veto";
            $exec=mysqli_query($link,$view);
            $sr = 0;
            while ($datarows=mysqli_fetch_array($exec)) {
              $Id = $datarows["id_vet"];
              $nom=$datarows["nom_vet"];
              $prenom=$datarows["prenom_vet"];
              $tel=$datarows["tel_vet"];
              $sr++;
              ?>
              <tr>
              <td><?php echo  $sr;?></td>
              <td><?php echo $Id; ?></td>
              <td><?php echo $nom; ?></td>
              <td><?php echo $prenom; ?></td>
              <td><?php echo $tel; ?></td>
              <td><a href="EditVeto.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">modifier &nbsp;&nbsp;</span></a>
               <a href="DeleteVeto.php?id=<?php echo $Id; ?>"> <span class="btn btn-danger">supprimer</span></a></td>
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
