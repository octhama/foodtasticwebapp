<?php
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array();
}

while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)){
    extract($ligne);


    echo "<div class='col-lg-3 mb-3'>";

        // l'id produit pour l'accès du scrpt javascript
        echo "<div class='id-produit display-none'>{$id}</div>";

        echo "<a href='Produit.php?id={$id}' class='lien-produit'>";
            // selectionné et montré l'image du premier produit
            $image_produit->produit_id=$id;
            $decl_image_produit=$image_produit->readFirst();

            while ($ligne_image_produit = $decl_image_produit->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='card-deck'>";
                echo "<div class='card'>";
        echo "<img src='uploads/images/{$ligne_image_produit['nomimgprod']}'  class='card-img-top' />";
        echo "<div class='card-body'>";

            // nom du produit
            echo "<p class='card-text nom-produit'>
            {$nomprod}            
        </p>";

echo "</a>";
// ajouter au panier
        echo "<div class='buy d-flex justify-content-between align-items-center'>";

            echo "<div class='price text-success'>";
                echo "<h5 class='mt-4'>&#8364;" . number_format($prixprod, 2, '.', ',') . "</h5>";
            echo "</div>";


            //ajouter au panier
            if(array_key_exists($id, $_SESSION['panier'])){
                echo "<a href='panier.php' class='btn btn-success btn-pill'> <i class='fas fa-shopping-cart'></i>
                    Panier
                </a>";
            }else{

                echo "<a href='ajouter_au_panier.php?id={$id}&page={$page}' class='btn btn-primary btn-pill'> <i class='fas fa-cart-plus'></i> Ajouter</a>";
            }
          echo "</div>";
        echo "</div>";
echo "</div>";
 echo "</div>";
  echo "</div>";

            }
}
include_once "paging.php";
?>

