<?php
include'db_user_connect.php';
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

      
      <!--AngularJS Framework
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
	<title>Foodtastic - Enregistrement</title>
</head>
<body class="app flex-row align-items-center">

            <div class="container">
            
            <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>S'enregistrer</h1>
              <p class="text-muted">Créez votre compte</p>
              <form action="" method="post">
              	
              	<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" placeholder="Identifiant de votre choix" name="identifiant" value="<?php if (isset($identifiant)){echo $identifiant;} ?>">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" placeholder="Email" name="email" value="<?php if(isset($email)) {echo $email;}?>">
              </div>
               <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" placeholder="Confirmez votre Email" name="emailconf" value="<?php if (isset($emailconf)){echo $emailconf;}?>">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" placeholder="Mot de passe" name="password_1" value="password">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" placeholder="Confirmez votre mot de passe" name="password_2" value="password">
              </div>
              <input type="submit" class="btn btn-block btn-success" name="reguser" value="Créer un compte">
               
              </form>

              <?php
              
              if (isset($erreur)) {
              	echo $erreur;
              }
              ?>
              
              
             
            </div>
            
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
                </div>

                 <div class="col-6 mt-4">
                  <a href="connexion.php">
                    Déjà un compte?
                  </a>
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