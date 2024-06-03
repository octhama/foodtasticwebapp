<?php
// pour la connexion à la bdd mysql
class Bdd{

    // définir les credential correspondant au serveur permettant l'accès et la connexion  à la bdd
    private string $host = "localhost";
    private string $nom_db = "foodtasticbdd";
    private string $username = "root";
    private string $password = "root";
    public $conn;

    // établir une connexion à la bdd
    public function connectoBdd(): ?PDO
    {

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nom_db, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Erreur de connexion: " . $exception->getMessage();
        }

        return $this->conn;
    }

}
