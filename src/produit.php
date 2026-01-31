<?php
require_once 'includes/config.php';

// Get product ID
$id = isset($_GET['id']) ? (int) $_GET['id'] : die('ERREUR: ID manquant.');

$produit->id = $id;
$produit->readOne();

// If product not found
if (!$produit->nom) {
    header("Location: index.php");
    exit();
}

$titre_page = $produit->nom . " - Foodtastic";
require_once 'includes/header.php';

// Get images
$image_produit->produit_id = $id;
$decl_image_produit = $image_produit->readByProductId();
$images = $decl_image_produit->fetchAll(PDO::FETCH_ASSOC);
$main_image = count($images) > 0 ? "uploads/images/" . $images[0]['nomimgprod'] : "https://via.placeholder.com/600x400";
?>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-transparent p-0 small">
        <li class="breadcrumb-item"><a href="index.php" class="text-muted text-decoration-none">Accueil</a></li>
        <li class="breadcrumb-item"><a href="produits.php" class="text-muted text-decoration-none">Boutique</a></li>
        <li class="breadcrumb-item active text-primary" aria-current="page"><?php echo $produit->nom; ?></li>
    </ol>
</nav>

<div class="row">
    <!-- Product Gallery -->
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm overflow-hidden mb-3">
            <img src="<?php echo $main_image; ?>" id="mainProductImg" class="img-fluid"
                alt="<?php echo $produit->nom; ?>" style="width: 100%; height: 500px; object-fit: cover;">
        </div>

        <?php if (count($images) > 1): ?>
            <div class="row no-gutters mx-n1">
                <?php foreach ($images as $img): ?>
                    <div class="col-3 p-1">
                        <img src="uploads/images/<?php echo $img['nomimgprod']; ?>"
                            class="img-fluid rounded cursor-pointer border thumb-img <?php echo ('uploads/images/' . $img['nomimgprod'] == $main_image) ? 'border-primary' : ''; ?>"
                            onclick="document.getElementById('mainProductImg').src=this.src; document.querySelectorAll('.thumb-img').forEach(i => i.classList.remove('border-primary')); this.classList.add('border-primary');"
                            style="height: 80px; width: 100%; object-fit: cover; cursor: pointer;">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Product Info -->
    <div class="col-lg-6">
        <div class="pl-lg-4">
            <span class="badge badge-soft-success mb-2 px-3 py-2"
                style="background: var(--accent-color); color: var(--primary-color);">En stock</span>
            <h1 class="display-5 font-weight-bold mb-3"><?php echo $produit->nom; ?></h1>

            <div class="d-flex align-items-center mb-4">
                <div class="h3 mb-0 font-weight-bold text-success mr-3">
                    <?php echo number_format($produit->prix, 2, ',', ' '); ?> €
                </div>
                <span class="text-muted small">TVA incluse</span>
            </div>

            <div class="mb-4 pb-4 border-bottom">
                <h6 class="font-weight-bold text-uppercase small text-muted mb-3">Description</h6>
                <div class="text-muted lead" style="font-size: 1.1rem;">
                    <?php echo htmlspecialchars_decode($produit->description); ?>
                </div>
            </div>

            <div class="mb-5">
                <h6 class="font-weight-bold text-uppercase small text-muted mb-3">Détails</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Agriculture locale certifiée
                    </li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Sans conservateurs</li>
                    <li><i class="fas fa-check-circle text-primary mr-2"></i> Emballage responsable</li>
                </ul>
            </div>

            <form action="ajouter_au_panier.php" method="GET" class="mb-4">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-row align-items-center">
                    <div class="col-md-3 mb-3">
                        <label class="small font-weight-bold text-muted d-block text-uppercase">Quantité</label>
                        <input type="number" name="quantite" value="1" class="form-control form-control-lg text-center"
                            min="1">
                    </div>
                    <div class="col-md-9 mb-3">
                        <label class="d-none d-md-block">&nbsp;</label>
                        <?php if (array_key_exists($id, $_SESSION['panier'])): ?>
                            <a href="panier.php" class="btn btn-success btn-lg btn-block btn-pill shadow">
                                <i class="fas fa-shopping-cart mr-2"></i>Voir le panier
                            </a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-pill shadow">
                                <i class="fas fa-cart-plus mr-2"></i>Ajouter au panier
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>

            <div class="card bg-light border-0">
                <div class="card-body p-3">
                    <div class="row text-center">
                        <div class="col-4 border-right">
                            <i class="fas fa-shipping-fast text-muted mb-2"></i>
                            <p class="small mb-0">Livraison 24h</p>
                        </div>
                        <div class="col-4 border-right">
                            <i class="fas fa-shield-alt text-muted mb-2"></i>
                            <p class="small mb-0">Paiement sécurisé</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-undo text-muted mb-2"></i>
                            <p class="small mb-0">Retour gratuit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>