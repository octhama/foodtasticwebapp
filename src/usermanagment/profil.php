<?php
require_once __DIR__ . '/../includes/config.php';

// Check if logged in
if (!isset($_SESSION['identifiant'])) {
  header('Location: ' . url('connexion.php'));
  exit();
}

// Handle logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: " . url('index.php'));
  exit();
}

$titre_page = "Mon Profil - Foodtastic";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border-0 shadow-lg animate__animated animate__fadeInUp">
      <div class="card-body p-5">
        <div class="text-center mb-5">
          <img
            src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['identifiant']); ?>&background=2D6A4F&color=fff&size=128"
            class="rounded-circle shadow mb-4" alt="Avatar">
          <h1 class="font-weight-bold">Mon Profil</h1>
          <p class="text-muted">Gérez vos informations personnelles</p>
        </div>

        <div class="row mb-4 pb-4 border-bottom">
          <div class="col-sm-4">
            <h6 class="font-weight-bold text-muted text-uppercase small">Identifiant</h6>
          </div>
          <div class="col-sm-8">
            <p class="h5 mb-0"><?php echo $_SESSION['identifiant']; ?></p>
          </div>
        </div>

        <div class="row mb-4 pb-4 border-bottom">
          <div class="col-sm-4">
            <h6 class="font-weight-bold text-muted text-uppercase small">Adresse E-mail</h6>
          </div>
          <div class="col-sm-8">
            <p class="h5 mb-0"><?php echo $_SESSION['mail']; ?></p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-sm-4">
            <h6 class="font-weight-bold text-muted text-uppercase small">Compte créé le</h6>
          </div>
          <div class="col-sm-8">
            <p class="h5 mb-0 text-muted" style="font-size: 0.9rem;">Information non disponible</p>
          </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
          <a href="editprofil.php" class="btn btn-primary btn-pill px-4 shadow">
            <i class="fas fa-edit mr-2"></i>Modifier mon profil
          </a>
          <a href="profil.php?logout=1" class="btn btn-outline-danger btn-pill px-4">
            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
          </a>
        </div>
      </div>
    </div>

    <div class="mt-4 text-center">
      <a href="<?php echo url('index.php'); ?>" class="btn btn-link text-muted">
        <i class="fas fa-arrow-left mr-2"></i>Retour à la boutique
      </a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>