<?php
$titre_page = "Connexion - Foodtastic";
require_once 'includes/auth.php';
require_once 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card shadow-lg border-0 overflow-hidden animate__animated animate__fadeIn">
      <div class="row no-gutters">
        <!-- Left Side: Login Form -->
        <div class="col-md-6 p-5">
          <div class="mb-4">
            <h1 class="font-weight-bold">Connexion</h1>
            <p class="text-muted">Bon retour parmi nous !</p>
          </div>

          <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success animate__animated animate__fadeInDown small">
              Compte créé avec succès ! Vous pouvez maintenant vous connecter.
            </div>
          <?php endif; ?>

          <form method="post" action="">
            <div class="form-group mb-4">
              <label class="small font-weight-bold text-muted">Identifiant</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-light border-right-0"><i class="fas fa-user-circle"></i></span>
                </div>
                <input class="form-control bg-light border-left-0" type="text" placeholder="Votre identifiant"
                  name="idconn" required>
              </div>
            </div>

            <div class="form-group mb-4">
              <div class="d-flex justify-content-between">
                <label class="small font-weight-bold text-muted">Mot de passe</label>
                <a href="#" class="small text-muted">Oublié ?</a>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-light border-right-0"><i class="fas fa-lock"></i></span>
                </div>
                <input class="form-control bg-light border-left-0" type="password" placeholder="••••••••" name="mdpconn"
                  required>
              </div>
            </div>

            <button type="submit" name="loguser" class="btn btn-primary btn-block btn-pill py-2 shadow mb-3">
              Me connecter
            </button>

            <?php if ($erreur): ?>
              <div class="alert alert-danger animate__animated animate__shakeX small">
                <?php echo $erreur; ?>
              </div>
            <?php endif; ?>
          </form>

          <p class="text-center text-muted small mt-4 mb-0">
            Pas encore de compte ? <a href="enregistrement.php"
              class="font-weight-bold text-primary text-decoration-none">S'inscrire</a>
          </p>
        </div>

        <!-- Right Side: Decorative/Marketing -->
        <div
          class="col-md-6 bg-primary d-none d-md-flex align-items-center justify-content-center text-white p-5 text-center">
          <div>
            <i class="fas fa-shopping-basket fa-4x mb-4 opacity-50"></i>
            <h2 class="font-weight-bold mb-3">Nouveau sur Foodtastic ?</h2>
            <p class="mb-5 opacity-75">Découvrez nos produits frais, locaux et responsables. Créez un compte pour
              profiter de tous nos services.</p>
            <a href="enregistrement.php" class="btn btn-outline-light btn-pill px-5 py-2">Créer un compte</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>