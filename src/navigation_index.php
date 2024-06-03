<?php
include ('authentification.php');
    if ($loginst == 1){ ?>
      <p class="bg-success text-white mb-0" style="text-align: center;">Bienvenue sur Foodtastic <?php echo $_SESSION['identifiant'];  ?> </p>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
      <a class="navbar-brand" href="index.php">Foodtastic</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="legume.php">Légumes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fruit.php">Fruits</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produits régionaux</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="miels.php">Miels</a>
                        <a class="dropdown-item" href="vins.php">Vins</a>
                        <a class="dropdown-item" href="huile_olive.php">Huile d'olive</a>
                        <a class="dropdown-item" href="confitures.php">Confitures</a>
                        <a class="dropdown-item" href="biscuits.php">Biscuits</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="https://imgplaceholder.com/30x30/cccccc/757575/glyphicon-user" class="avatar" alt="Avatar" style="max-width: none; margin: -8px 0; border-radius: 50%; margin-right: 10px; float: left;"> <?php echo $_SESSION['identifiant']; ?></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="usermanagment/profil.php" class="dropdown-item"><i class="fa fa-user-o"></i> Mon profil</a></li>
                        <li><a href="panier.php" class="dropdown-item"><i class="fab fa-opencart"></i> Panier de <?php echo $_SESSION['identifiant'];?></a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="usermanagment/profil.php?logout='1'" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Déconnexion</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Support&FaQ</a>
                </li>
            </ul>
        </div>
    </nav>

      <?php } else { ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" role="navigation">
      <a class="navbar-brand" href="index.php">Foodtastic</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="legume.php">Légumes</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="fruit.php">Fruits</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produits régionaux</a>
        <div class="dropdown-menu" aria-labelledby="dropdown09">
        <a class="dropdown-item" href="miels.php">Miels</a>
        <a class="dropdown-item" href="vins.php">Vins</a>
        <a class="dropdown-item" href="huile_olive.php">Huile d'olive</a>
        <a class="dropdown-item" href="confitures.php">Confitures</a>
        <a class="dropdown-item" href="biscuits.php">Biscuits</a>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
        </li>
                <li class="dropdown nav-item order-1">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">S'enregistrer</a>
                    <ul class="dropdown-menu dropdown-menu-right mt-2 animated flipInX " style="width: 300px">
                       <li class="px-3 py-2">
                           <form class="form" role="form" method="post" action="" >
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Identifiant de votre choix" name="identifiant" value="<?php if (isset($identifiant)){echo $identifiant;} ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email" value="<?php if(isset($email)) {echo $email;}?>">
                                </div>
                                <div class="form-group">
                                     <input class="form-control" type="email" placeholder="Confirmez votre Email" name="emailconf" value="<?php if (isset($emailconf)){echo $emailconf;}?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Mot de passe" name="password_1" value="password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirmez votre mot de passe" name="password_2" value="password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-success" name="reguser" value="Créer un compte">
                                </div>
                                <div class="form-group text-center">
                                    <small><a href="#" data-toggle="modal" data-target="#modalPassword">Mot de passe oublié?</a></small>
                                </div>
                            </form>
                            <?php
              if (isset($erreur)) {
                echo $erreur;
              }
              ?>
                        </li>
                    </ul>
                </li>

                <li class="dropdown nav-item order-1">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Se connecter</a></span></a>
                    <ul class="dropdown-menu dropdown-menu-right mt-2 animated slideInRight" style="width: 300px">
                       <li class="px-3 py-2">
                           <form class="form" role="form" method="post" action="">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Entrez votre identifiant" name="idconn">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Entrez votre mot de passe" name="mdpconn">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="loguser"class="btn btn-primary px-4" value="Connexion">
                                </div>
                                <div class="form-group text-center">
                                    <small><a href="#" data-toggle="modal" data-target="#modalPassword">Mot de passe oublié?</a></small>
                                </div>
                            </form>
                            <?php if (isset($erreur)) {

                  echo $erreur;
                }
                 ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Support&FaQ</a>
                </li>
      </ul>
</nav>

<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Mot de passe oublié</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Réinitialiser votre mot de passe...en cours de maintenance :)</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
                <button class="btn btn-primary">Changer</button>
            </div>
        </div>
    </div>
</div>

<?php }
?>
