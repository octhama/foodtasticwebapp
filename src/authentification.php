<?php
// connexion à la bdd correspondante
include('db_user_connect.php');

$loginst = 0;

// Vérifier si identifiant de l'utilisateur existe dans la bdd
if (isset($_SESSION['identifiant'])) {
    $id_auth = $_SESSION['identifiant'];

    // requête permettant de parcourir le tableau dans la bdd
    $ses_req = $db->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant = :id_auth");

    // exécution de la requête
    $ses_req->execute([':id_auth' => $id_auth]);

    // vérifier si l'utilisateur est trouvé
    if ($ses_req->rowCount() > 0) {
        $loginst = 1;
    }
}
?>
