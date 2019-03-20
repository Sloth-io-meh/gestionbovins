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
  $req = "INSERT INTO bovins(id_bov,race,dateachat,prixachat,poidachat,lieuachat,id_etab,id_vend,id_q)VALUES('$idb','$race','$da','$pa','$pdA','$la','$eta','$v','$q')";
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
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
        </ul>
      </div>   <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des bovins</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel-group">
            <div class="panel panel-primary ">
              <div class="panel-heading"> Gestion Bovins </div>
              <div class="panel-body">
                <a href="ajoutEtab.php" class="col-lg"><button type="button" href="ajoutNetab.php" class="btn btn-primary "> Ajouter des etables</button></a>
                  <a href="ajoutBovins.php" class="col-lg"><button type="button" href="ajoutNetab.php" class="btn btn-primary "> Ajouter des Bovins</button></a>
                  <a href="ajoutVendeur.php" class="col-lg"><button type="button" href="ajoutNetab.php" class="btn btn-primary "> Ajouter des Vendeurs</button></a>
              </div>
</div>
  </div>
              <div class="panel panel-primary">
                <div class="panel-heading">Qarantaine</div>
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
                $view = "SELECT * FROM bovins where id_q= 1";
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
                  <td><a href="DonnerAlim.php?Edit=<?php echo $Id; ?>"><span class="btn btn-success">Donner l'alimentation</span></a>
                   <a href="DonnerMed.php?Edit=<?php echo $Id; ?>"> <span class="btn btn-primary">Donner des medicaments</span></a>
                 <a href="removeQ.php?id=<?php echo $Id; ?>"> <span class="btn btn-warning">Retirer de la quarantaine</span></a>
                 <a href="mort.php?Edit=<?php echo $Id; ?>"><span class="btn btn-danger">Mort</span></a></td>
       </tr>
     <?php } ?>
      </table>
    </div>
    </div>
    </div>
          </div>

          <div class="">
              <div class="panel panel-primary">
                <div  class="panel-heading">Bovins Availables
                <div class="text-right"><a href="transportSelected.php?Edit=<?php echo $Id; ?>"><span class="btn btn-success">Transporter</span></a>
                  </div>
                </div>
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
                $view = "SELECT * FROM bovins where vendu='0' and mort='0' and id_q='2'";
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
                  <td>
                    <a href="vendu.php?Edit=<?php echo $Id; ?>"><span class="btn btn-primary">Vendu</span></a>
                    <a href="DonnerAlim.php?Edit=<?php echo $Id; ?>"><span class="btn btn-success">Donner l'alimentation</span></a>
                   <a href="DonnerMed.php?Edit=<?php echo $Id; ?>"> <span class="btn btn-primary">Donner des medicaments</span></a>
                 <a href="addQ.php?id=<?php echo $Id; ?>"> <span class="btn btn-warning">ajouter a la quarantaine</span></a>
                 <a href="mort.php?Edit=<?php echo $Id; ?>"><span class="btn btn-danger">Mort</span></a>
               </td>
       </tr>
     <?php } ?>
      </table>
    </div>
    </div>
    </div>
          </div>
          <div class="">
              <div class="panel panel-primary">
                <div class="panel-heading">Vendu</div>
    <div class="panel-body">
      <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
        <th>No</th>
        <th>Identifiant</th>
        <th>Race</th>
        <th>Date de vente</th>
        <th>Prix de vente</th>
        <th>Poids de vente</th>
        <th>Lieu de vente</th>

      </tr>
      <?php
                global $link;
                $view = "SELECT * FROM bovins where vendu='1'";
                $exec=mysqli_query($link,$view);
                $sr = 0;
                while ($datarows=mysqli_fetch_array($exec)) {
                  $Id = $datarows["id_bov"];
                  $libelle=$datarows["race"];
                  $desc = $datarows["datevente"];
                  $p = $datarows["prixavente"];
                  $q = $datarows["poidvente"];
                  $dateA = $datarows["lieuvente"];
                  $sr++;
                  ?>
                  <tr>
                  <td><?php echo  $sr;?></td>
                  <td><?php echo $Id; ?></td>
                  <td><?php echo $libelle; ?></td>
                  <td><?php echo $desc; ?></td>
                  <td><?php echo " ".$p." DH"; ?></td>
                  <td><?php echo $q."Kg"; ?></td>
                  <td><?php echo $dateA; ?></td>
       </tr>
     <?php } ?>
      </table>
    </div>
    </div>
    </div>
          </div>

          <div class="">
              <div class="panel panel-primary">
                <div class="panel-heading">Mort</div>
    <div class="panel-body">
      <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
        <th>No</th>
        <th>Identifiant</th>
        <th>Race</th>
        <th>Date de mort </th>
      </tr>
      <?php
                global $link;
                $view = "SELECT * FROM bovins where mort='1'";
                $exec=mysqli_query($link,$view);
                $sr = 0;
                while ($datarows=mysqli_fetch_array($exec)) {
                  $Id = $datarows["id_bov"];
                  $libelle=$datarows["race"];
                  $desc = $datarows["datemort"];
                  $sr++;
                  ?>
                  <tr>
                  <td><?php echo  $sr;?></td>
                  <td><?php echo $Id; ?></td>
                  <td><?php echo $libelle; ?></td>
                  <td><?php echo $desc; ?></td>

       </tr>
     <?php } ?>
      </table>
    </div>
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
