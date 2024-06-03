<?php
// définir les crédentials de connection à la bdd
$nomserveur = "localhost";
$username = "root";
$password = "root";

// gestion des erreurs de connection à la bdd
try {
    $db = new PDO("mysql:host=$nomserveur;dbname=foodtasticbdd", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET CHARACTER SET utf8");
} catch (Exception $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

// Connexion de l'utilisateur
if (isset($_POST['loguser'])) {
    $idconn = htmlspecialchars($_POST['idconn']);
    $mdpconn = sha1($_POST['mdpconn']);

    if (!empty($idconn) && !empty($mdpconn)) {
        $requserconn = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant = ? AND mot_de_passe = ?");
        $requserconn->execute(array($idconn, $mdpconn));

        $userexist = $requserconn->rowCount();
        if ($userexist == 1) {
            $userinfo = $requserconn->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("location: /foodtasticwebapp/src/index.php?id=" . $_SESSION['id']);
        } else {
            header("location: /foodtasticwebapp/src/index.php");
        }
    } else {
        $erreur = "Veuillez bien remplir tout les champs";
    }
}

// Enregistrement d'un utilisateur
if (isset($_POST['reguser'])) {
    // Sécurité contre les injections mysql
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $email = htmlspecialchars($_POST['email']);
    $emailconf = htmlspecialchars($_POST['emailconf']);
    $password_1 = sha1($_POST['password_1']);
    $password_2 = sha1($_POST['password_2']);

    if (!empty($_POST['identifiant']) && !empty($_POST['email']) && !empty($_POST['emailconf']) && !empty($_POST['password_1']) && !empty($_POST['password_2'])) {
        $identifiantlength = strlen($identifiant);
        if ($identifiantlength <= 255) {
            if ($email == $emailconf) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $db->prepare("SELECT * FROM utilisateurs WHERE mail = ? LIMIT 1");
                    $reqmail->execute(array($email));
                    $mailexist = $reqmail->rowCount();

                    if ($mailexist == 0) {
                        if ($password_1 == $password_2) {
                            $req = $db->prepare("INSERT INTO utilisateurs (identifiant, mail, mot_de_passe) VALUES (?, ?, ?)");
                            $req->execute(array($identifiant, $email, $password_1));
                            header("location: /foodtasticwebapp/src/connexion.php");
                        } else {
                            $erreur = "Vos mots de passe ne sont pas identiques";
                        }
                    } else {
                        $erreur = "Cet adresse mail existe déjà";
                    }
                } else {
                    $erreur = "Votre adresse mail est invalide";
                }
            } else {
                $erreur = "Votre identifiant dépasse 255 caractères";
            }
        } else {
            $erreur = "Veuillez bien remplir tous les champs";
        }
    }
}
?>
