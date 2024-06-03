<?php
session_start();
// définir les crédentials de connection à la bdd
$nomserveur = "localhost";
$username = "root";
$password = "root";
// gestion des erreurs de connection à la bdd
try {
  $db = new PDO("mysql:host=$nomserveur;dbname=foodtasticbdd",$username,$password);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db -> exec("SET CHARACTER SET utf8");
  
} catch (Exception $e) {

  echo "Echec de connexion: " . $e->getMessage();
  
}
if (isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
	$supprime = (int) $_GET['supprime'];

	$req = $db->prepare('DELETE FROM utilisateurs SET supprime = 1 WHERE id = ?');
	$req->execute(array($supprime));
}
if (isset($_SESSION['id'])) {
	$req = $db->prepare("SELECT * FROM utilisateurs WHERE id = ?");
	$req->execute(array($_SESSION['id']));
	$utilisateurs = $req->fetch();

if (isset($_POST['nvpseudo']) AND !empty($_POST['nvpseudo']) AND $_POST['nvpseudo'] != $_SESSION['identifiant']) {

	$nvpseudo = htmlspecialchars($_POST['nvpseudo']);
	$nvidentifiant = $db->prepare("UPDATE utilisateurs SET identifiant = ? WHERE id = ?");
	$nvidentifiant->execute(array($nvpseudo, $_SESSION['id']));
	header('Location : profil.php?id='. $_SESSION['id']);
}


?>

<!DOCTYPE html>
<html>
<head>
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
	<title>Editer mon profil - Foodtastic</title>
</head>
<?php include 'navprofil.php'; ?>
<body>


<div align="center">
<h2>Edition de mon profil</h2>

<form method="POST" action="">
<table>
	<tr>
		<td><label>Identifiant :</label></td>
		<td><input type="text" name="nvpseudo" placeholder="Identifiant" value="<?php echo $_SESSION['identifiant']; ?>"/></td>
	</tr>
	<tr>
		<td><label>Email :</label></td>
		<td><input type="text" name="nvmail" placeholder="Mail" value="<?php echo $_SESSION['mail'];?>"/><br/></td>
	</tr>
	<tr>
		<td><label>Nouveau mot de passe :</label></td>
		<td><input type="password" name="nvmdp1" placeholder="Mot de passe"/></td>
	</tr>
	<tr>
		<td><label>Confirmer votre nouveau mot de passe :</label></td>
		<td><input type="password"  name="nvmdp2" placeholder="Confirmation du mot de passe"/></td>
	</tr>
</table>

<br/>
<div class="col-md-2">
	<input type="submit" class="btn btn-pill btn-success active" value="Mettre à jour mon profil"/>
</div>
<br/>

<div class="col-sm-2">
	<?php if ($_SESSION['supprime'] == 0): ?>
		<a href="/foodtasticwebapp/src/index.php?supprime=<?php $_SESSION['id']?>" class="btn btn-pill btn-danger active" aria-pressed="true">Supprimer mon profil</a>
	<?php endif ?>
	
</div>
</form>

</div>

  
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Font awesome pour les petites icônes-->
<script src="https://kit.fontawesome.com/679b1b8818.js"></script>
</html>
<?php
}else{
	header("Location : foodtasticwebapp/src/index.php");
}
?>