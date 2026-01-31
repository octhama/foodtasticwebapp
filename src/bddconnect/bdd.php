<?php
// pour la connexion à la bdd mysql
class Bdd
{

    // définir les credential correspondant au serveur permettant l'accès et la connexion  à la bdd
    private string $host = "127.0.0.1";
    private string $nom_db = "foodtasticbdd";
    private string $username = "root";
    private string $password = "root";
    public $conn;

    // établir une connexion à la bdd
    public function connectoBdd(): ?PDO
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nom_db . ";charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("<h1>Erreur de connexion à la base de données</h1><p>Vérifiez que Docker est lancé et que le port 3306 est accessible.</p><p>Détail: " . $exception->getMessage() . "</p>");
        }

        return $this->conn;
    }

}
