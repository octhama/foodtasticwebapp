<?php
// objet 'produit'
class Produit
{

    // connexion à la bdd et nom de la table
    private $conn;
    private $nom_table = "produits";

    // attributs de l'objet
    public $id;
    public $nom;
    public $prix;
    public $description;
    public $id_categorie;
    public $nom_categorie;
    public $timestamp;

    // constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // lire tous les produits
    function read($num_article, $articles_par_page)
    {
        // sélectionner tous les produits
        $req = "SELECT
                    id, nomprod, description, prixprod 
                FROM
                    " . $this->nom_table . "
                ORDER BY
                    datecrea DESC
                LIMIT
                    ?, ?";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // déclaration des paramètres pour limiter le nombre d'articles par page
        $decl->bindParam(1, $num_article, PDO::PARAM_INT);
        $decl->bindParam(2, $articles_par_page, PDO::PARAM_INT);

        // exécution de la requête
        $decl->execute();

        // renvoyer les valeurs
        return $decl;
    }

    // utiliser pour la pagination des produits
    public function count()
    {
        // requête pour compter tous les produits enregistrés
        $req = "SELECT count(*) FROM " . $this->nom_table;

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // exécution de la requête
        $decl->execute();

        // récupérer la valeur de la ligne
        $lignes = $decl->fetch(PDO::FETCH_NUM);

        // renvoyer le compte
        return $lignes[0];
    }

    // lire tous les produits basés sur les ids produits inclus dans la variable $ids
    public function lireParIds($ids)
    {
        $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

        // requête pour sélectionner les produits
        $req = "SELECT id, nomprod, prixprod FROM " . $this->nom_table . " WHERE id IN ({$ids_arr}) ORDER BY nomprod";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // exécution de la requête
        $decl->execute($ids);

        // retourner les valeurs depuis la bdd
        return $decl;
    }

    // lire les articles par catégorie
    public function lireParCategorie($id_categorie)
    {
        // requête pour sélectionner tous les produits
        $req = "SELECT id, nomprod, description, prixprod, id_categorie, nom_categorie  
                FROM " . $this->nom_table . " 
                WHERE id_categorie = ?";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // lier les paramètres
        $decl->bindParam(1, $id_categorie, PDO::PARAM_INT);

        // exécution de la requête
        $decl->execute();

        // retourner les valeurs
        return $decl;
    }

    // lire les articles par catégories spécifiques
    function lireParCategorieMiel()
    {
        return $this->lireParCategorie(13);
    }

    function lireParCategorieWine()
    {
        return $this->lireParCategorie(14);
    }

    function lireParCategorieOlive()
    {
        return $this->lireParCategorie(15);
    }

    function lireParCategorieJam()
    {
        return $this->lireParCategorie(16);
    }

    function lireParCategorieCookie()
    {
        return $this->lireParCategorie(17);
    }

    function lireParCategorieVeg()
    {
        return $this->lireParCategorie(18);
    }

    function lireParCategorieFruit()
    {
        return $this->lireParCategorie(19);
    }

    // lire un seul produit pour le formulaire de mise à jour
    function readOne(): void
    {
        // requête pour sélectionner un seul enregistrement
        $req = "SELECT
                    nomprod, description, prixprod
                FROM
                    " . $this->nom_table . "
                WHERE
                    id = ?
                LIMIT
                    0,1";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // assainir
        $this->id = htmlspecialchars(strip_tags($this->id));

        // lier l'id du produit
        $decl->bindParam(1, $this->id, PDO::PARAM_INT);

        // exécution de la requête
        $decl->execute();

        // obtenir les valeurs de la ligne
        $ligne = $decl->fetch(PDO::FETCH_ASSOC);

        // assigner les valeurs récupérées aux propriétés de l'objet
        $this->nom = $ligne['nomprod'];
        $this->description = $ligne['description'];
        $this->prix = $ligne['prixprod'];
    }
}

