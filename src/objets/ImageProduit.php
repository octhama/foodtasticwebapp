<?php
// objet 'image produit'
class ImageProduit {

    // connexion à la bdd et nom de la table
    private $conn;
    private string $nom_table = "images_produits";

    // attributs de l'objet
    public $id;
    public $produit_id;
    public $nom;
    public $timestamp;

    // constructeur
    public function __construct($db) {
        $this->conn = $db;
    }

    // lire la première image liée à un produit
    function readFirst() {
        // requête SQL
        $req = "SELECT id, produit_id, nomimgprod
                FROM " . $this->nom_table . "
                WHERE produit_id = ?
                ORDER BY nomimgprod DESC
                LIMIT 0, 1";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // contre les injections SQL
        $this->produit_id = htmlspecialchars(strip_tags($this->produit_id));

        // lier chaque id à son produit
        $decl->bindParam(1, $this->produit_id, PDO::PARAM_INT);

        // exécution de la requête
        $decl->execute();

        // renvoyer les valeurs
        return $decl;
    }

    // lire toutes les images produit en relation avec un produit
    function readByProductId() {
        // requête SQL
        $req = "SELECT id, produit_id, nomimgprod
                FROM " . $this->nom_table . "
                WHERE produit_id = ?
                ORDER BY nomimgprod ASC";

        // déclaration de la requête préparée
        $decl = $this->conn->prepare($req);

        // contre les injections SQL
        $this->produit_id = htmlspecialchars(strip_tags($this->produit_id));

        // lier chaque id à son produit
        $decl->bindParam(1, $this->produit_id, PDO::PARAM_INT);

        // exécution de la requête
        $decl->execute();

        // renvoyer les valeurs
        return $decl;
    }
}
