<?php 
  session_start(); 

  if (!isset($_SESSION['identifiant'])) {
  	$_SESSION['msg'] = "Connectez-vous d'abord s'il vous plaît";
  	header('location: /foodtasticwebapp/src/index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['identifiant']);

  	header("location: /foodtasticwebapp/src/index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSS Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!--CSS stylesheet-->
      
      <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
      <link rel="stylesheet" type="text/css" href="/foodtasticwebapp/src/stylefoodtastic.css">
      <!--AngularJS Framework-->
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<title>Profil - Foodtastic</title>
</head>
<body>
<h1 align="center">
<p>Profil - Foodtastic</p>
</h1>
<?php include 'navprofil.php';?>
<div align="center" class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['identifiant'])) : ?>

    	<p>Bienvenue <strong><?php echo $_SESSION['identifiant']; ?></strong></p>
      <h2> Profil de <?php echo $_SESSION['identifiant'];  ?></h2>
      Pseudo : <?php echo $_SESSION['identifiant'];  ?><br>
      Mail : <?php echo $_SESSION['mail'];  ?><br>
      <?php
      if (isset($_SESSION['id'])) {
      ?>
      <a href="editprofil.php">Editer mon profil</a>
      <p> <a href="/foodtasticwebapp/src/usermanagment/profil.php?logout='1'" style="color: red;">Déconnexion</a> </p>
      <?php  
      }else{
        header("location : foodtasticwebapp/src/index.php");
      }
      ?>
    <?php endif ?>
</div>
</body>
<footer>
  
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Font awesome pour les petites icônes-->
<script src="https://kit.fontawesome.com/679b1b8818.js"></script>
</html>