<?php
$titre_page = "Mon Panier - Foodtastic";
require_once 'includes/header.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
$panier = $_SESSION['panier'];

if ($action == 'supprimer') {
    echo "<div class='alert alert-info animate__animated animate__fadeInDown'>Le produit a été retiré de votre panier.</div>";
} else if ($action == 'select_quantite') {
    echo "<div class='alert alert-success animate__animated animate__fadeInDown'>Panier mis à jour !</div>";
}
?>

<div class="mb-5">
    <h1 class="title h2">Mon Panier</h1>
</div>

<?php if (count($panier) > 0): ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 px-4 py-3">Produit</th>
                                    <th class="border-0 py-3">Prix</th>
                                    <th class="border-0 py-3" style="width: 150px;">Quantité</th>
                                    <th class="border-0 py-3">Total</th>
                                    <th class="border-0 py-3 text-right px-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ids = array_keys($panier);
                                $decl = $produit->lireParIds($ids);
                                $total_general = 0;
                                $nb_articles = 0;

                                while ($row = $decl->fetch(PDO::FETCH_ASSOC)):
                                    extract($row);
                                    $quantite = $panier[$id]['quantite'];
                                    $sous_total = $prixprod * $quantite;
                                    $total_general += $sous_total;
                                    $nb_articles += $quantite;

                                    $image_produit->produit_id = $id;
                                    $img_row = $image_produit->readFirst()->fetch(PDO::FETCH_ASSOC);
                                    $img = $img_row ? "uploads/images/{$img_row['nomimgprod']}" : "https://via.placeholder.com/80";
                                    ?>
                                    <tr>
                                        <td class="px-4 py-4">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo $img; ?>" alt="<?php echo $nomprod; ?>"
                                                    class="rounded mr-3 shadow-sm" width="60" height="60"
                                                    style="object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-0 font-weight-bold"><?php echo $nomprod; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle"><?php echo number_format($prixprod, 2, ',', ' '); ?> €</td>
                                        <td class="align-middle">
                                            <form action="select_quantite.php" method="GET" class="d-flex">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="quantite" value="<?php echo $quantite; ?>"
                                                        class="form-control text-center" min="1" onchange="this.form.submit()">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="align-middle font-weight-bold text-success">
                                            <?php echo number_format($sous_total, 2, ',', ' '); ?> €</td>
                                        <td class="align-middle text-right px-4">
                                            <a href="supprimer_du_panier.php?id=<?php echo $id; ?>"
                                                class="btn btn-sm btn-outline-danger btn-pill">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <a href="index.php" class="btn btn-link text-muted"><i class="fas fa-chevron-left mr-2"></i>Continuer mes
                achats</a>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-lg bg-light sticky-top" style="top: 100px; z-index: 10;">
                <div class="card-body p-4">
                    <h5 class="font-weight-bold mb-4">Résumé de la commande</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Nombre d'articles</span>
                        <span class="font-weight-medium"><?php echo $nb_articles; ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Frais de livraison</span>
                        <span class="text-success small">Gratuit</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-5">
                        <span class="h5 mb-0 font-weight-bold">Total</span>
                        <span
                            class="h4 mb-0 font-weight-bold text-primary"><?php echo number_format($total_general, 2, ',', ' '); ?>
                            €</span>
                    </div>

                    <a href="paiement.php" class="btn btn-primary btn-block btn-pill py-3 shadow font-weight-bold">
                        Procéder au paiement <i class="fas fa-arrow-right ml-2"></i>
                    </a>

                    <div class="mt-4 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" height="20"
                            class="mx-2 opacity-50" alt="PayPal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" height="15"
                            class="mx-2 opacity-50" alt="Visa">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" height="20"
                            class="mx-2 opacity-50" alt="MasterCard">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <div class="text-center py-5 animate__animated animate__fadeIn">
        <i class="fas fa-shopping-basket fa-5x text-muted mb-4 opacity-25"></i>
        <h3>Votre panier est vide</h3>
        <p class="text-muted mb-4">Découvrez nos délicieux produits frais et locaux pour commencer à remplir votre panier.
        </p>
        <a href="index.php" class="btn btn-primary btn-pill px-5 shadow">Parcourir la boutique</a>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>