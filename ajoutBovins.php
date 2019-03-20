<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $idb = $_POST["id_bov"];
  $race = $_POST["race"];
  $da = $_POST["dateachat"];
  $pa = $_POST["prixachat"];
  $pdA = $_POST["poidachat"];
  $la = $_POST["lieuachat"];
  $eta = $_POST["id_etab"];
  $v = $_POST["id_vend"];
  $q = $_POST["id_q"];
  global $link;
  $req = "INSERT INTO bovins(id_bov,race,dateachat,prixachat,poidachat,lieuachat,id_etab,id_vend,id_q,vendu,mort)VALUES('$idb','$race','$da','$pa','$pdA','$la','$eta','$v','$q','0','0')";
  $exec = mysqli_query($link, $req);
  if ($exec) {
  $_SESSION["SuccessMessage"] = "Ajouté Avec success";
  redirect("ajoutBovins.php");
}elseif ($exec == false ) {
  $_SESSION["Message"] = "Erreur d'ajout";
  redirect("ajoutBovins.php");
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
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>  </ul>
      </div>   <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des bovins</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Ajouter un Stock</div>
  <div class="panel-body">
    <form class="" action="ajoutbovins.php" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Identifiant du Bovin</label>
          <input required  type="text" class="form-control" name="id_bov" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Race:</label>
          <textarea class="form-control" name="race" required></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="type">Date d'Achat:</label>
          <input required  type="date" class="form-control" name="dateachat" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">prix d'achat:</label>
          <input required  type="number" step="any" class="form-control" name="prixachat" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">poids d'achat:</label>
          <input required  type="number" step="any" class="form-control" name="poidachat" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Lieu d'achat:</label>
          <input required  type="text" class="form-control" name="lieuachat" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Etable:</label>
          <select class="form-control" name="id_etab">
            <?php
                    global $link;
                    $view = "SELECT * FROM etables ";
                    $exec=mysqli_query($link,$view);
                    while ($datarows=mysqli_fetch_array($exec)) {
                      $Id=$datarows["id_etab"];
                      $nom=$datarows["nom"];

                      ?>
                      <option value="<?php echo $Id; ?>" > <?php echo $nom;  ?></option>
                    <?php } ?>
          </select>
        </div>

          <div class="form-group col-md-6">
            <label for="type">Vendeur:</label>
            <select class="form-control" name="id_vend">
              <?php
                      global $link;
                      $view = "SELECT * FROM vendeur ";
                      $exec=mysqli_query($link,$view);
                      while ($datarows=mysqli_fetch_array($exec)) {
                        $Id=$datarows["id_vend"];
                        $nom=$datarows["nom_vend"];
                        $prenom=$datarows["prenom_vend"];
                        ?>
                        <option value="<?php echo $Id; ?>" > <?php echo $nom." ".$prenom;  ?></option>
                      <?php } ?>
            </select>

          </div>
          <div class="form-group col-md-6">
            <label for="type">Quarantaine:</label>
            <select class="form-control" name="id_q">
              <?php
                      global $link;
                      $view = "SELECT * FROM quarantaine ";
                      $exec=mysqli_query($link,$view);
                      while ($datarows=mysqli_fetch_array($exec)) {
                        $Id=$datarows["id_q"];
                        $nom=$datarows["libelle"];

                        ?>
                        <option value="<?php echo $Id; ?>" > <?php echo $nom;  ?></option>
                      <?php } ?>
            </select>

          </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Ajouter">
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les Bovins Availables/ajouté</div>
<div class="panel-body">
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
    <th>No</th>
    <th>Identifiant</th>
    <th>Race</th>
    <th>Date d'achat</th>
    <th>Prix d'achat</th>
    <th>Poids d'achat</th>
    <th>Lieu d'achat</th>
    <th>Action</th>
  </tr>
  <?php
            global $link;
            $view = "SELECT * FROM bovins";
            $exec=mysqli_query($link,$view);
            $sr = 0;
            while ($datarows=mysqli_fetch_array($exec)) {
              $Id = $datarows["id_bov"];
              $libelle=$datarows["race"];
              $desc = $datarows["dateachat"];
              $p = $datarows["prixachat"];
              $q = $datarows["poidachat"];
              $dateA = $datarows["lieuachat"];
              $sr++;
              ?>
              <tr>
              <td><?php echo  $sr;?></td>
              <td><?php echo $Id; ?></td>
              <td><?php echo $libelle; ?></td>
              <td><?php echo $desc; ?></td>
              <td><?php echo " ".$p." DH"; ?></td>
              <td><?php echo $q; ?></td>

              <td><?php echo $dateA; ?></td>
              <td><a href="EditBovins.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">modifier &nbsp;&nbsp;</span></a>
               <a href="DeleteBovins.php?id=<?php echo $Id; ?>"> <span class="btn btn-danger">supprimer</span></a></td>
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
