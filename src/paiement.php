<?php
require_once 'includes/config.php';

$titre_page = "Paiement - Foodtastic";
require_once 'includes/header.php';

$panier = $_SESSION['panier'];

if (count($panier) > 0):
    $ids = array_keys($panier);
    $decl = $produit->lireParIds($ids);
    $total = 0;
    $article_compter = 0;
    ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg animate__animated animate__fadeIn">
                <div class="card-body p-5">
                    <h1 class="font-weight-bold mb-4">Récapitulatif de commande</h1>

                    <div class="mb-5">
                        <?php while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)):
                            extract($ligne);
                            $quantite = $panier[$id]['quantite'];
                            $sous_total = $prixprod * $quantite;
                            $article_compter += $quantite;
                            $total += $sous_total;
                            ?>
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                <div>
                                    <h6 class="font-weight-bold mb-1"><?php echo $nomprod; ?></h6>
                                    <span class="text-muted small"><?php echo $quantite; ?> x
                                        <?php echo number_format($prixprod, 2, ',', ' '); ?> €</span>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold"><?php echo number_format($sous_total, 2, ',', ' '); ?>
                                        €</span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="bg-light p-4 rounded-lg mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Sous-total (<?php echo $article_compter; ?> articles)</span>
                            <span><?php echo number_format($total, 2, ',', ' '); ?> €</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Frais de port</span>
                            <span class="text-success">Offerts</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-3">
                            <h4 class="font-weight-bold mb-0">Total à payer</h4>
                            <h4 class="font-weight-bold text-primary mb-0"><?php echo number_format($total, 2, ',', ' '); ?>
                                €</h4>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['identifiant'])): ?>
                        <div class="text-center mt-5">
                            <p class="text-muted small mb-4"><i class="fas fa-lock mr-2"></i>Paiement 100% sécurisé</p>
                            <a href="commander.php" class="btn btn-primary btn-lg btn-pill px-5 py-3 shadow font-weight-bold">
                                Confirmer et commander <i class="fas fa-check-double ml-2"></i>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning p-4 border-0 shadow-sm animate__animated animate__pulse">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle fa-2x mr-3 text-warning"></i>
                                <div>
                                    <h6 class="font-weight-bold mb-1">Connexion requise</h6>
                                    <p class="mb-0 small text-muted">Veuillez vous <a href="connexion.php"
                                            class="font-weight-bold">connecter</a> ou vous <a href="enregistrement.php"
                                            class="font-weight-bold">enregistrer</a> pour finaliser votre commande.</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="panier.php" class="btn btn-link text-muted">
                    <i class="fas fa-arrow-left mr-2"></i>Retour au panier
                </a>
            </div>
        </div>
    </div>

<?php else: ?>
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-4x text-muted mb-4 opacity-25"></i>
        <h3>Panier vide</h3>
        <p class="text-muted">Vous n'avez aucun article à payer.</p>
        <a href="index.php" class="btn btn-primary btn-pill px-4 mt-3">Retour à la boutique</a>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>