<?php
$titre_page = "S'enregistrer - Foodtastic";
require_once 'includes/auth.php';
require_once 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-lg border-0 animate__animated animate__zoomIn">
      <div class="card-body p-5">
        <div class="text-center mb-4">
          <h1 class="font-weight-bold">Créer un compte</h1>
          <p class="text-muted">Rejoignez la communauté Foodtastic</p>
        </div>

        <form action="" method="post">
          <div class="form-group mb-3">
            <label class="small font-weight-bold text-muted">Identifiant</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-light border-right-0"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control bg-light border-left-0" type="text" placeholder="Choisir un identifiant"
                name="identifiant" value="<?php echo isset($identifiant) ? $identifiant : ''; ?>" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="small font-weight-bold text-muted">E-mail</label>
                <input class="form-control bg-light" type="email" placeholder="votre@email.com" name="email"
                  value="<?php echo isset($email) ? $email : ''; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="small font-weight-bold text-muted">Confirmer E-mail</label>
                <input class="form-control bg-light" type="email" placeholder="votre@email.com" name="emailconf"
                  required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="small font-weight-bold text-muted">Mot de passe</label>
                <input class="form-control bg-light" type="password" placeholder="••••••••" name="password_1" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-4">
                <label class="small font-weight-bold text-muted">Confirmer Mot de passe</label>
                <input class="form-control bg-light" type="password" placeholder="••••••••" name="password_2" required>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-pill py-2 shadow" name="reguser">
            S'enregistrer maintenant
          </button>

          <?php if ($erreur): ?>
            <div class="alert alert-danger mt-3 animate__animated animate__shakeX small">
              <?php echo $erreur; ?>
            </div>
          <?php endif; ?>
        </form>

        <div class="text-center mt-4">
          <span class="text-muted small">Déjà un compte ?</span>
          <a href="connexion.php" class="small font-weight-bold text-primary ml-1 text-decoration-none">Se connecter</a>
        </div>
      </div>

      <div class="card-footer bg-light p-4 text-center border-0">
        <p class="small text-muted mb-3">Ou s'inscrire avec</p>
        <div class="d-flex justify-content-center">
          <button class="btn btn-outline-secondary btn-pill mx-2" type="button"><i
              class="fab fa-facebook-f mr-2"></i>Facebook</button>
          <button class="btn btn-outline-secondary btn-pill mx-2" type="button"><i
              class="fab fa-google mr-2"></i>Google</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>