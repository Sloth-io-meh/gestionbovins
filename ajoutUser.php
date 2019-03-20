<?php require_once("include/Sessions.php") ?>
<?php require_once("include/functions.php")?>
<?php require_once("include/connexion.php") ?>
<?php veriflog(); ?>
<?php
try {
if (isset($_POST["submit"])){
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $adr = $_POST["adresse"];
  $v = $_POST["ville"];
  $c = $_POST["code"];
  $tel = $_POST["tel"];
  $mail = $_POST["mail"];
  $p = $_POST["pass"];
  $cp = $_POST["confirmpass"];
  if (strlen($p)<4) {
    $_SESSION["ErrorMessage"]="at least 4 characters";
    redirect("ajourUser.php");
  }
  elseif ($p!== $cp) {
    $_SESSION["ErrorMessage"]= " password / confirm password does not match ";
    redirect("ajoutUser.php");
  }else {
    global $link;
    $req = "INSERT INTO information(nom,prenom,adresse,ville,code,tel,mail,password)VALUES('$nom','$prenom','$adr','$v','$c','$tel','$mail','$p')";
    $exec = mysqli_query($link, $req);
    if ($exec) {
    $_SESSION["SuccessMessage"] = "Ajouté Avec success";
    redirect("ajoutUser.php");
  }elseif ($exec == false ) {
    $_SESSION["Message"] = "Erreur d'ajout";
    redirect("ajoutUser.php");
  }

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
            <li class="active"><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Gestion Utilisateur</a></li>
            <li class="pull-down"><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a> </li>
        </ul>
      </div>   <!-- fin de menu-->
        <div class="col-sm-10">
          <h1>Gestion Des Utilisateurs</h1>
          <div class="">
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
          <div class="">
            <div class="panel panel-primary">
              <div class="panel-heading">Ajouter un utilisateur</div>
  <div class="panel-body">
    <form class="" action="ajoutUser.php" method="post">
      <fieldset>

        <div class="form-group col-md-6">
          <label for="type">Nom:</label>
          <input required  type="text" class="form-control" name="nom" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Preom:</label>
          <input required  type="text" class="form-control" name="prenom" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Adresse:</label>
          <input required  type="text" class="form-control" name="adresse" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Ville:</label>
          <input required  type="text" class="form-control" name="ville" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Code Postale:</label>
          <input required  type="text" class="form-control" name="code" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">tel:</label>
          <input required  type="text" class="form-control" name="tel" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Mail:</label>
          <input required  type="text" class="form-control" name="mail" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Password:</label>
          <input required  type="text" class="form-control" name="pass" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="type">Confirmer Password:</label>
          <input required  type="text" class="form-control" name="confirmpass" value="">
        </div>
        <input required  class="btn btn-primary btn-block" type="submit" name="submit" value="Ajouter">
      </fieldset>
    </form>
  </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Les utilisateurs ajouté</div>
<div class="panel-body">
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
    <th>No</th>
    <th>Nom</th>
    <th>Preom</th>
    <th>Adresse</th>
    <th>Tel</th>
    <th>Mail</th>
    <th>Action</th>
  </tr>
  <?php
            global $link;
            $view = "SELECT * FROM information";
            $exec=mysqli_query($link,$view);
            $sr = 0;
            while ($datarows=mysqli_fetch_array($exec)) {
              $Id = $datarows["Id_user"];
              $nom=$datarows["nom"];
              $prenom=$datarows["prenom"];
              $adr=$datarows["adresse"];$v=$datarows["ville"];$c=$datarows["code"];
              $tel=$datarows["tel"];
              $mail=$datarows["mail"];
              $sr++;
              ?>
              <tr>
              <td><?php echo  $sr;?></td>
              <td><?php echo $nom; ?></td>
              <td><?php echo $prenom; ?></td>
              <td><?php echo $adr.", ".$v.", ".$c; ?></td>
              <td><?php echo $tel; ?></td>
              <td><?php echo $mail; ?></td>
              <td>
               <a href="DeleteUser.php?id=<?php echo $Id; ?>"> <span class="btn btn-danger">supprimer</span></a></td>
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
