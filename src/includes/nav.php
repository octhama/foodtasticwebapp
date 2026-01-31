<?php
// Authentication logic (simplified from db_user_connect.php)
$is_logged_in = isset($_SESSION['id']);
$user_id = $is_logged_in ? $_SESSION['id'] : null;
$username = $is_logged_in ? $_SESSION['identifiant'] : null;
$compte_panier = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand animate__animated animate__fadeIn" href="<?php echo url('index.php'); ?>">
            <span style="color: var(--primary-color)">Food</span>tastic
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('index.php'); ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('legume.php'); ?>">Légumes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('fruit.php'); ?>">Fruits</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropProduits" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Produits régionaux
                    </a>
                    <div class="dropdown-menu animate__animated animate__fadeIn" aria-labelledby="dropProduits">
                        <a class="dropdown-item" href="<?php echo url('miels.php'); ?>">Miels</a>
                        <a class="dropdown-item" href="<?php echo url('vins.php'); ?>">Vins</a>
                        <a class="dropdown-item" href="<?php echo url('huile_olive.php'); ?>">Huile d'olive</a>
                        <a class="dropdown-item" href="<?php echo url('confitures.php'); ?>">Confitures</a>
                        <a class="dropdown-item" href="<?php echo url('biscuits.php'); ?>">Biscuits</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link position-relative" href="<?php echo url('panier.php'); ?>">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <?php if ($compte_panier > 0): ?>
                            <span class="badge badge-pill badge-danger position-absolute" style="top: -5px; right: -5px;">
                                <?php echo $compte_panier; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>

                <?php if ($is_logged_in): ?>
                    <li class="nav-item dropdown ml-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userMenu"
                            data-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($username); ?>&background=2D6A4F&color=fff"
                                class="rounded-circle mr-2" width="30" height="30" alt="Avatar">
                            <span>
                                <?php echo $username; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate__animated animate__fadeInUp">
                            <a class="dropdown-item" href="<?php echo url('usermanagment/profil.php'); ?>">
                                <i class="fas fa-user-circle mr-2"></i>Mon profil
                            </a>
                            <a class="dropdown-item" href="<?php echo url('panier.php'); ?>">
                                <i class="fas fa-shopping-basket mr-2"></i>Mon panier
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger"
                                href="<?php echo url('usermanagment/profil.php?logout=1'); ?>">
                                <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                            </a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item ml-lg-3">
                        <a class="btn btn-secondary btn-pill mr-2" href="<?php echo url('connexion.php'); ?>">Se
                            connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-pill text-white"
                            href="<?php echo url('enregistrement.php'); ?>">S'inscrire</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div style="height: 80px;"></div> <!-- Spacer for fixed-top navbar -->