<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
    <a class="navbar-brand" href="/foodtasticwebapp/src/produits.php">Foodtastic Marketplace</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
 
        <div class="navbar-collapse collapse" id="navbarCollapse" style="">
            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="/foodtasticwebapp/src/index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/foodtasticwebapp/src/legume.php">Légumes</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/foodtasticwebapp/src/fruit.php">Fruits</a>
                    </li>
                            <!-- Affiché si $titre_page correspond 'Produits' -->
                <li class="nav-item dropdown"  <?php echo $titre_page=="Produits - Foodtastic" ? "class='nav-item active'" : ""; ?>>
                    <a class="nav-link dropdown-toggle"  id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="produits.php" >Nos produits régionaux</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="/foodtasticwebapp/src/miels.php">Miels</a>
                        <a class="dropdown-item" href="/foodtasticwebapp/src/vins.php">Vins</a>
                        <a class="dropdown-item" href="/foodtasticwebapp/src/huile_olive.php">Huile d'olive</a>
                        <a class="dropdown-item" href="/foodtasticwebapp/src/confitures.php">Confitures</a>
                        <a class="dropdown-item" href="/foodtasticwebapp/src/biscuits.php">Biscuits</a>
                    </div>
                </li>
                <li <?php echo $titre_page=="Panier - Foodtastic" ? "class='nav-item active'" : ""; ?> >
                    <a href="panier.php" class="nav-link">
                        <?php
                        // compté les articles dans le panier 
                         $compte_panier=count($_SESSION['panier']);
                        ?>
                        Panier <span class="badge badge-pill badge-danger" id="comparison-count"><?php echo $compte_panier; ?></span>

                    </a>
                </li>
            </ul>
 <div class="col-lg-5 ml-auto">
        <div class="input-group">
            <input type="text" v-model="" class="form-control" placeholder="Recherche...">
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
        </div><!--/.nav-collapse -->
 
     
</nav>
<!-- /navbar -->