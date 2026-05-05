<?php
require_once("include/Sessions.php");
require_once("include/functions.php");
require_once("include/connexion.php");

//mysqli_query($link,'SET CHARACTER_SET utf8');
if (isset($_POST['submit'])) {
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  if (empty($username) || empty($password)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled";
    redirect("Login.php");
  } else {
    $found = logintempt($username, $password);

    if ($found) {
      $_SESSION["user_Id"] = $found["Id_user"];
      $_SESSION["username"] = $found["mail"];
      $_SESSION["SuccessMessage"] = "Welcome {$_SESSION["username"]} ";
      redirect("gestBovins.php");
    } else {
      $_SESSION["ErrorMessage"] = "username/password invalide ";
      redirect("Login.php");
    }
  }
}

?>
<!DOCTYPE html>
<html>
<style> </style>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/adminstyle.css">
  <title>Login_page</title>
</head>

<body>
  <div class="container-fluid ctnf">
    <div class="row">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="">
          <br><br><br>
          <center><img src="img/cow.png" style="width:60%; position:relative;"alt=""></center>
            <center><h1 style="color:White;">Service d'authetification</h1></center>
          <br><br><br><br>
          <?php echo Message();
                echo SuccessMessage();
          ?>
        </div>
        <div>
          <form action="Login.php" method="post">
            <fieldset>
              <div class="form-group">

                  <label for="Username">Username:</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user text-primary"></span>
                    </span>
                  <input class="form-control" type="text" name="Username" id="Username" placeholder="Username">
                </div>

              </div>

              <div class="form-group">
                <label for="Password">Password:</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock text-primary"></span>
                  </span>
                <input class="form-control" type="password" name="Password" id="Password" placeholder="Password">
              </div>

            <br>
              <input class="btn btn-primary btn-block" type="submit" name="submit" value="Log in">
              <br>
                        </fieldset>
          </form>
        </div>

      </div>  <!-- fin de main -->

    </div>  <!-- fin row-->
  </div>  <!-- fin container-->


  </div>
</body>
</html>
