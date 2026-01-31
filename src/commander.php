<?php
require_once 'includes/config.php';

// Clear the cart after a successful order (in a real app, you'd save to DB first)
if (isset($_SESSION['panier'])) {
    unset($_SESSION['panier']);
}

$titre_page = "Merci pour votre commande ! - Foodtastic";
require_once 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8 text-center py-5">
        <div class="card border-0 shadow-lg animate__animated animate__zoomIn">
            <div class="card-body p-5">
                <div class="mb-4">
                    <div class="icon-circle bg-success text-white mx-auto mb-4 d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px; border-radius: 50%;">
                        <i class="fas fa-check fa-3x"></i>
                    </div>
                </div>

                <h1 class="font-weight-bold text-success mb-3">Commande Confirmée !</h1>
                <p class="lead text-muted mb-4">Merci de faire confiance à Foodtastic.</p>

                <div class="alert alert-light border border-light shadow-sm p-4 mb-5">
                    <p class="mb-0">Votre commande a bien été validée. Vous recevrez bientôt un e-mail de confirmation
                        avec les détails de la livraison.</p>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-md-8">
                        <a href="facture.php" target="_blank" class="btn btn-outline-primary btn-block btn-pill mb-3">
                            <i class="fas fa-file-invoice mr-2"></i>Télécharger ma facture
                        </a>
                        <a href="index.php" class="btn btn-primary btn-block btn-pill shadow">
                            <i class="fas fa-store mr-2"></i>Retourner à la boutique
                        </a>
                    </div>
                </div>

                <p class="small text-muted mb-0">Un problème ? <a href="#">Contactez le support</a></p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>