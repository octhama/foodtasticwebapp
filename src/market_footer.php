   </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Font awesome pour les petites icônes-->
<script src="https://kit.fontawesome.com/679b1b8818.js"></script>
 
<script>
$(document).ready(function(){
    // fonction permettant d'ajouter des articles au panier 
    $('.form-ajt-au-panier').on('submit', function(){
 
        // info is in the table / single product layout
        var id = $(this).find('.id-produit').text();
        var quantite = $(this).find('.quantite-panier').val();
 
        // redirect to add_to_cart.php, with parameter values to process the request
        window.location.href = "ajouter_au_panier.php?id=" + id + "&quantite=" + quantite;
        return false;
    });

    // fonction permettant de choisir la quantité d'article voulu
$('.form-select-quantite').on('submit', function(){
 
    // récupération d'informations permettant la mise à jour du panier après l'ajout ou le retrait d'un article
    var id = $(this).find('.id-produit').text();
    var quantite = $(this).find('.quantite-panier').val();
 
    // redirection vers update_quantity.php, avec les valeurs des paramêtres pour  procédé à la requête
    window.location.href = "select_quantite.php?id=" + id + "&quantite=" + quantite;
    return false;
});

});

</script>
 
</body>
</html>