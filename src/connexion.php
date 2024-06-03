<?php
// Démarrer la session
session_start();
include 'db_user_connect.php';
?>

<!DOCTYPE html>
<html>
<head lang="fr">
	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSS Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- CORE UI CSS-->
      <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">

      
      <!--AngularJS Framework-->
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<title>Foodtastic - Connexion</title>
</head>
<body class="app flex-row align-items-center">

            <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Connexion</h1>
                <p class="text-muted">Se connecter</p>
                <form method="post" action="">
                 
                 
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" placeholder="Entrez votre identifiant" name="idconn">
                </div>
                 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" placeholder="Entrez votre mot de passe" name="mdpconn">
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="loguser"class="btn btn-primary px-4" value="Connexion">
                    
                  </div>
                  <div class="col-6 text-right">

                    <button class="btn btn-link px-0" type="button">Mot de passe oublié?</button>
                  </div>
                </div>

                </form>
                
                <?php if (isset($erreur)) {

                  echo $erreur;
                } 
                 ?>
               
                
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>S'enregistrer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="enregistrement.php" class="btn btn-primary active mt-3" role="button">Enregistrez-vous dès maintenant!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>        
            
            
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<!--Font awesome pour les petites icônes-->
<script src="https://kit.fontawesome.com/679b1b8818.js"></script>
</html>