<?php
// Démarrer la session
session_start();

// connection à la bdd
include 'bddconnect/bdd.php';

// implémentation des objects
include_once "models/Produit.php";
include_once "models/ImageProduit.php";

// établir la connection à la bdd
$bdd = new Bdd();
$db = $bdd->connectoBdd();

// initialisation des models
$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// définir le titre de la page
$titre_page="Panier - Foodtastic";

// ajouter l'entête de la page
include 'market_header.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-md-12'>";
    if($action=='supprimer'){
        echo "<div class='alert alert-info'>";
            echo "Produit(s) retiré(s) du panier !";
        echo "</div>";
    }

    else if($action=='select_quantite'){
        echo "<div class='alert alert-info'>";
            echo "Produit(s) ajouté(s) au panier !";
        echo "</div>";
    }
echo "</div>";

if(count($_SESSION['panier'])>0){

    // recupérer l'ids du produit
    $ids = array();
    foreach($_SESSION['panier'] as $id=>$value){
        array_push($ids, $id);
    }

    $decl=$produit->lireParIds($ids);

    $total=0;
    $article_compter=0;

    while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)){
        extract($ligne);

        $quantite=$_SESSION['panier'][$id]['quantite'];
        $montant_total=$prixprod*$quantite;

        // =================

    echo "<div class='col-lg-4 mt-4'>";
    $image_produit->produit_id=$id;
            $decl_image_produit=$image_produit->readFirst();

            while ($ligne_image_produit = $decl_image_produit->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='card'>";
        echo "<img src='uploads/images/{$ligne_image_produit['nomimgprod']}' class='card-img'/>";

                echo "<div class='card-body'>";
        echo "<div class='cart-row'>";
echo "<div class='col-md-4 text-sucess'>";
                echo "<h4>&#8364;" . number_format($prixprod, 2, '.', ',') . "</h4>";
            echo "</div>";

            echo "<div class='col-md-8'>";

                // nom du produit
            echo "<p class='card-text nom-produit'>
            {$nomprod}            
        </p>";

                // definir la quantuté de produit
                echo "<form class='form-select-quantite'>";
                    echo "<div class='id-produit' style='display:none;'>{$id}</div>";
                    echo "<div class='input-group'>";
                        echo "<input type='number' name='quantite' value='{$quantite}' class='form-control quantite-panier' min='1'/>";
                            echo "<span class='input-group-append'>";
                                echo "<button class='btn btn-primary btn-pill select-quantite' type='submit'><i class='fas fa-cart-plus'></i> Ajouter</button>";
                            echo "</span>";
                    echo "</div>";
                echo "</form>";

                // supprimer du panier
                echo "<a href='supprimer_du_panier.php?id={$id}' class='btn btn-danger btn-pill mt-2'><i class='far fa-trash-alt'></i>
                    Rétirer
                </a>";
            echo "</div>";


        echo "</div>";
        echo "</div>";
  echo "</div>";
echo "</div>";

}
        // =================

        $article_compter += $quantite;
        $total+=$montant_total;
    }

    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
        echo "<div class='cart-row'>";
            echo "<h4 class='mt-3'>Total ({$article_compter} articles)</h4>";
            echo "<h4>&#8364;" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='paiement.php' class='btn btn-success btn-pill mb-3'> <i class='fas fa-check'></i>
                Procéder au paiement
            </a>";
        echo "</div>";
    echo "</div>";

}

// aucun produit n'a été ajouté
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Aucun produit(s) trouvé(s) dans votre panier! <a href='produits.php'> 
                cliquez-ici
            </a> pour avoir voir nos produits Foodtastic";
        echo "</div>";
    echo "</div>";
}


// ajout du pied de page
include 'market_footer.php';
?>
