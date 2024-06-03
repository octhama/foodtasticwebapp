<?php
echo "<div class='col-md-12'>";
 
    echo "<ul class='pagination m-b-20px m-t-0px'>";
 
    // bouton de la première page
    if($page>1){
        echo "<li class='page-item'><a class='page-link' href='{$page_url}' title='Revenir à la première page.'>";
            echo "Début";
        echo "</a></li>";
    }
 
    $total_pages = ceil($nbr_lignes / $articles_par_page);
 
    // ranger de liens a montrer
    $range = 2;
 
    // affichage des liens pour 'les ranger de pages' dans 'la page courante'
    $initial_num = $page - $range;
    $condition_limit_num = ($page + $range)  + 1;
 
    for ($x=$initial_num; $x<$condition_limit_num; $x++) {
 
        // s'assurer que '$x est plus grand que 0' ET 'moins que ou égal aux $total_pages'
        if (($x > 0) && ($x <= $total_pages)) {
 
            // page en cours
            if ($x == $page) {
                echo "<li class='page-item active'><a class='page-link' href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
            }
 
            // page non courante
            else {
                echo "<li class='page-item'><a class='page-link' href='{$page_url}page=$x'>$x</a></li>";
            }
        }
    }
 
    // bouton pour la dernière page
    if($page<$total_pages){
        echo "<li class='page-item'>";
            echo "<a class='page-link' href='" . $page_url . "page={$total_pages}' title='La dernière page est {$total_pages}.'>";
                echo "Fin";
            echo "</a>";
        echo "</li>";
    }
 
    echo "</ul>";
echo "</div>";
?>