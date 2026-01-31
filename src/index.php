<?php
$titre_page = "Accueil - Foodtastic";
$show_hero = true;
require_once 'includes/header.php';
?>

<!-- Carousel Section -->
<div id="heroCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#heroCarousel" data-slide-to="1"></li>
    <li data-target="#heroCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images-produits/carbio1.jpeg" alt="Saine alimentation">
      <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInUp">
        <h2 class="display-4 font-weight-bold">Fraîcheur locale</h2>
        <p class="lead">Découvrez notre sélection de produits frais directement venus des producteurs.</p>
        <a href="produits.php" class="btn btn-primary btn-lg btn-pill mb-3">Voir la boutique</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images-produits/carbio6.jpeg" alt="Fruits de saison">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="display-4 font-weight-bold">Agriculture Responsable</h2>
        <p class="lead">Soutenez une économie circulaire avec des produits sains et sans OGM.</p>
        <a href="fruit.php" class="btn btn-primary btn-lg btn-pill mb-3">Nos Fruits</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images-produits/carbio10.jpeg" alt="Panier garni">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="display-4 font-weight-bold">Livraison Rapide</h2>
        <p class="lead">Votre panier livré chez vous dans le respect de l'environnement.</p>
        <a href="panier.php" class="btn btn-primary btn-lg btn-pill mb-3">Composer mon panier</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Précédent</span>
  </a>
  <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Suivant</span>
  </a>
</div>

<!-- Features Section -->
<div class="container marketing mt-5 pt-5">
  <div class="row text-center">
    <div class="col-lg-4">
      <div class="mb-4">
        <img class="rounded-circle shadow-lg" width="160" height="160" src="uploads/images/chianti.jpeg" alt="Vins">
      </div>
      <h3>Vins Responsables</h3>
      <p class="text-muted px-3">Profitez de notre meilleure sélection de vins issus d'une agriculture responsable
        provenant de vignobles sélectionnés.</p>
      <p><a class="btn btn-secondary btn-pill" href="vins.php">En savoir plus &raquo;</a></p>
    </div>
    <div class="col-lg-4">
      <div class="mb-4">
        <img class="rounded-circle shadow-lg border border-success" width="160" height="160"
          src="images-produits/cartgreen.png" alt="Panier">
      </div>
      <h3>Panier Sur Mesure</h3>
      <p class="text-muted px-3">Composez votre panier selon vos envies. Enregistrez-vous pour faciliter vos futurs
        achats.</p>
      <?php if (isset($_SESSION['identifiant'])): ?>
        <a class="btn btn-primary btn-pill shadow" href="panier.php">Mon Panier</a>
      <?php else: ?>
        <a class="btn btn-success btn-pill shadow" href="enregistrement.php">S'enregistrer</a>
      <?php endif; ?>
    </div>
    <div class="col-lg-4">
      <div class="mb-4">
        <img class="rounded-circle shadow-lg" width="160" height="160"
          src="https://cdn.pixabay.com/photo/2019/04/04/11/30/delivery-4102583__480.jpg" alt="Livraison">
      </div>
      <h3>Livraison Express</h3>
      <p class="text-muted px-3">Où que vous soyez, nous nous assurons de vous livrer en temps et en heure grâce à notre
        réseau local.</p>
      <p><a class="btn btn-secondary btn-pill" href="#">Zones de livraison &raquo;</a></p>
    </div>
  </div>

  <div class="separator"></div>

  <!-- Product Spotlight -->
  <div class="text-center mb-5">
    <h2 class="title h1">Sélection Foodtastic</h2>
    <p class="lead text-muted">Nos produits stars du moment, choisis avec soin pour vous.</p>
  </div>

  <div class="row">
    <?php
    // Hardcoded IDs for spotlight as in original code
    $spotlight_ids = [32, 31, 19, 90, 20, 33];
    // Fetch these products
    $spotlight_items = $produit->lireParIds($spotlight_ids);

    while ($row = $spotlight_items->fetch(PDO::FETCH_ASSOC)):
      extract($row);
      $image_produit->produit_id = $id;
      $img_row = $image_produit->readFirst()->fetch(PDO::FETCH_ASSOC);
      $img = $img_row ? "uploads/images/{$img_row['nomimgprod']}" : "https://via.placeholder.com/300x200";
      ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
          <img class="card-img-top" src="<?php echo $img; ?>" alt="<?php echo $nomprod; ?>">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title font-weight-bold"><?php echo $nomprod; ?></h5>
            <p class="card-text text-muted small flex-grow-1">Découvrez la saveur authentique de nos produits locaux de
              haute qualité.</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <span class="h5 mb-0 text-success font-weight-bold"><?php echo number_format($prixprod, 2, ',', ' '); ?>
                €</span>
              <a href="produit.php?id=<?php echo $id; ?>" class="btn btn-outline-primary btn-pill btn-sm">Détails</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>