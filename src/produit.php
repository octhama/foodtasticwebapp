<?php
// Démarrer la session
session_start();

// insérer les class
include_once "bddconnect/bdd.php";
include_once "models/Produit.php";
include_once "models/ImageProduit.php";

// établir une connection avec la bdd
$bdd = new Bdd();
$db = $bdd->connectoBdd();

// initialisation des models
$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// récupérer l'id du produit à éditer
$id = isset($_GET['id']) ? $_GET['id'] : die('ERREUR: ID manquant.');

// affecter l'id comme produit apparteant a l'id
$produit->id = $id;

// lire un seul produit enregistrer
$produit->readOne();

// titre de page
$titre_page = $produit->nom;

// affecter l'id produit
$image_produit->produit_id = $id;

// lecture de toutes les images de produit
$decl_image_produit = $image_produit->readByProductId();

// compter toutes les images de produit
$num_image_produit = $decl_image_produit->rowCount();



// entête de la page
include_once 'market_header.php';

 echo "<div class='col-md-5' id='img-produit'>";

    // lecture de toutes les images de produit en relation
    $decl_image_produit = $image_produit->readByProductId();
    $num_image_produit = $decl_image_produit->rowCount();

    // si le compte est plus grand que zero
    if($num_image_produit>0){
        // la boucle essaye toutes les images de produit
        $x=0;
        while ($ligne = $decl_image_produit->fetch(PDO::FETCH_ASSOC)){
            // nom d'image et source url
            $nom_image_produit = $ligne['nomimgprod'];
            $source="uploads/images/{$nom_image_produit}";
            $affiche_img_produit=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='produit-img-{$ligne['id']}' class='produit-img {$affiche_img_produit}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }else{ echo "Aucune image(s)."; }
echo "</div>";

echo "<div class='col-md-4'>";

    echo "<div class='detail-produit'>Prix:</div>";
    echo "<h4 class='mt-10 description-prix'>&#8364;" . number_format($produit->prix, 2, '.', ',') . "</h4>";

    echo "<div class='detail-produit mb-3'>Description du produit:</div>";
    echo "<div class='mb-3'>";
        // faire de html
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($produit->description));

        // montrer à l'utilisateur
        echo $page_description;
    echo "</div>";

 echo "<div class='detail-produit mt-3'>Catégorie:</div>";
    echo "<div class=''>{$produit->nom_categorie}</div>";


echo "</div>";
echo "<div class='col-md-2'>";

    // si le produit était déjà dans le panier
    if(array_key_exists($id, $_SESSION['panier'])){
        echo "<div class='mb-3'>Ce produit a déja été ajouter à votre panier.</div>";
        echo "<a href='panier.php' class='btn btn-success'> <i class='fas fa-shopping-cart'></i>
            Panier
        </a>";

    }

    // si le produit n'étais pas encore dans le panier
    else{

        echo "<form class='form-ajt-au-panier'>";
            // product id
            echo "<div class='id-produit display-none'>{$id}</div>";

            echo "<div class='mb-2'>Quantité:</div>";
            echo "<input type='number' value='1' class='form-control m-b-10px quantite-panier' min='1' />";

            // enable add to cart button
            echo "<button style='width:100%;' type='submit' class='btn btn-primary btn-pill add-to-cart mt-3'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Ajouter au panier";
            echo "</button>";

        echo "</form>";
    }
echo "</div>";

//  pied de page
include_once 'market_footer.php';
