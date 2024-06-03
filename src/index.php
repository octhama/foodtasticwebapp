

<!--entête de la page principale-->
<?php require 'header_index.php';?>

<!--Début carousel-->
<div id="carouselExampleControls" class="container carousel slide w-80" data-ride="carousel">
	<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-fluid img-responsive" src="/foodtasticwebapp/src/images-produits/carbio1.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>...</h5>
    <p>...</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid img-responsive" src="/foodtasticwebapp/src/images-produits/carbio6.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>...</h5>
    <p>...</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid img-responsive" src="/foodtasticwebapp/src/images-produits/carbio10.jpeg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>...</h5>
    <p>...</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--Fin carousel-->

<!--Début contenue marketing-->
<div class="container marketing">
  <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" width="140" height="140" src="../src/uploads/images/chianti.jpeg">
        <h2>Vin issu d'une agriculture responsable</h2>
        <p>Porfiter de notre meilleure sélection de vins issu d'une agriculture responsable sans OGM provenant de vignoble sud-Africains, Belge, Français et nord américain.</p>
        <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/vins.php" role="button">En savoir plus »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
       <img class="rounded-circle" width="140" height="140" src="/foodtasticwebapp/src/images-produits/cartgreen.png">
        <h2>Composer votre panier</h2>
        <p>Veuillez bien vous enregister sur notre page avant de composer votre panier afin de faciliter l'élaboration de vôtre facture ou preuve d'achat.</p>
        <?php if (isset($_SESSION['identifiant'])) {
          echo "<a class='btn btn-pill btn-success' href='/foodtasticwebapp/src/panier.php' role='button'>Composer vôtre panier</a>";
        }else{
          echo "<a class='btn btn-pill btn-danger' href='enregistrement.php'  role='button'>Enregistrez-vous</a>";
        }  ?>

      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="rounded-circle" width="140" height="140" src="https://cdn.pixabay.com/photo/2019/04/04/11/30/delivery-4102583__480.jpg">
        <h2>Livraison à temps et facturation en ligne </h2>
        <p>Où que vous soignez nous nous assurons de vous livrez en temps et en heure grâce à notre vaste réseau de livreurs, en tout sécurité. Recevez également votre facture ou preuve d'achat en ligne pour à présenter au livreur pour un réception sécurisé de vos commandes</p>
        <p><a class="btn btn-secondary btn-pill" href="#" role="button">En savoir plus »</a></p>
      </div><!-- /.col-lg-4 -->
    </div>
<!--Fin contenue marketing-->

<!--Sélection de produits pour le client-->

 <h2 class="title"  style="text-align: center;">Notre sélection de produits Foodtastic pour vous </h2>
<hr class="separator">
    <div class="row featurette">
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/jamfraise.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=32" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/jacobcreek.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=31" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/macaron.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=19" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/mangoes.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=90" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/honeybottle.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=20" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <img class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225" focusable="false" role="img" src="/foodtasticwebapp/src/uploads/images/jamorange.jpeg">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
               <p><a class="btn btn-secondary btn-pill" href="/foodtasticwebapp/src/produit.php?id=33" role="button">En savoir plus »</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
 <hr class="featurette-divider">

<!--Footer page principale-->
<?php require 'footer_index.php';?>



