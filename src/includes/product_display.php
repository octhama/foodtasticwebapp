<?php
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if ($num > 0): ?>
    <div class="row">
        <?php while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)):
            extract($ligne);
            // Get the image
            $image_produit->produit_id = $id;
            $decl_image_produit = $image_produit->readFirst();
            $ligne_image_produit = $decl_image_produit->fetch(PDO::FETCH_ASSOC);
            $img_src = $ligne_image_produit ? "uploads/images/{$ligne_image_produit['nomimgprod']}" : "https://via.placeholder.com/300x200?text=Foodtastic";
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card shadow-sm h-100">
                    <a href="produit.php?id=<?php echo $id; ?>">
                        <img src="<?php echo $img_src; ?>" class="card-img-top" alt="<?php echo $nomprod; ?>">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title nom-produit">
                            <a href="produit.php?id=<?php echo $id; ?>" class="text-dark text-decoration-none">
                                <?php echo $nomprod; ?>
                            </a>
                        </h5>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="h5 mb-0 text-success font-weight-bold">
                                    <?php echo number_format($prixprod, 2, ',', ' '); ?> €
                                </span>
                            </div>

                            <?php if (array_key_exists($id, $_SESSION['panier'])): ?>
                                <a href="panier.php" class="btn btn-success btn-block btn-pill">
                                    <i class="fas fa-check mr-2"></i>Dans le panier
                                </a>
                            <?php else: ?>
                                <a href="ajouter_au_panier.php?id=<?php echo $id; ?>&page=<?php echo $page; ?>"
                                    class="btn btn-primary btn-block btn-pill">
                                    <i class="fas fa-cart-plus mr-2"></i>Ajouter
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <?php
    // Pagination
    if (isset($page_url)) {
        include_once __DIR__ . "/paging.php";
    }
    ?>

<?php else: ?>
    <div class="col-12 text-center py-5">
        <div class="animate__animated animate__fadeIn">
            <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
            <h3>Aucun produit disponible</h3>
            <p class="text-muted">Nous n'avons pas trouvé de produits dans cette catégorie pour le moment.</p>
            <a href="index.php" class="btn btn-primary btn-pill mt-3">Retour à l'accueil</a>
        </div>
    </div>
<?php endif; ?>