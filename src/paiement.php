<?php
// Démarrer la session
session_start();

// connection à la bdd
include 'bddconnect/bdd.php';

// implémentation des objects
include_once "objets/Produit.php";
include_once "objets/ImageProduit.php";

// établir la connection à la bdd
$bdd = new Bdd();
$db = $bdd->connectoBdd();

// initialisation des objets
$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// titre de la page
$titre_page="Paiement - Foodtastic";

// ajout de l'entête
include 'market_header.php';

if(count($_SESSION['panier'])>0){

    // récupérer l'ids des produits
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

        //echo "<div class='product-id' style='display:none;'>{$id}</div>";
        //echo "<div class='product-name'>{$name}</div>";

        // =================
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";

                echo "<div class='nom-produit mb-3'><h4>{$nomprod}</h4></div>";
                echo $quantite>1 ? "<div>{$quantite} articles</div>" : "<div>{$quantite} article</div>";

            echo "</div>";

            echo "<div class='col-md-4'>";
                echo "<h4>&#8364;" . number_format($prixprod, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        // =================

        $article_compter += $quantite;
        $total+=$montant_total;
    }

    // echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($article_compter>1){
                echo "<h4 class='mb-3'>Total ({$article_compter} articles)</h4>";
            }else{
                echo "<h4 class='mb-3'>Total ({$article_compter} article)</h4>";
            }
            echo "<h4>&#8364;" . number_format($total, 2, '.', ',') . "</h4>";
            if (isset($_SESSION['identifiant'])) {
               echo "<a href='commander.php' class='btn btn-lg btn-success btn-pill mt-5'> <i class='fas fa-check-double'></i>
                 Commander
            </a>";
            }else{

                echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Veuillez bien vous <a href='enregistrement.php'>enregister</a> avant de passer votre commande!  
                
            ";
        echo "</div>";
    echo "</div>";

            }

        echo "</div>";
    echo "</div>";

}

else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Aucun produit(s) trouvé dans votre panier!";
        echo "</div>";
    echo "</div>";
}

include 'market_footer.php';
?>
