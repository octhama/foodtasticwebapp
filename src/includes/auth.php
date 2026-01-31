<?php
require_once __DIR__ . "/config.php";

$erreur = "";

// User Login
if (isset($_POST['loguser'])) {
    $idconn = htmlspecialchars(trim($_POST['idconn']));
    $mdpconn = sha1($_POST['mdpconn']); // Keeping sha1 for compatibility with existing DB

    if (!empty($idconn) && !empty($mdpconn)) {
        $requserconn = $db->prepare("SELECT * FROM utilisateurs WHERE identifiant = ? AND mot_de_passe = ?");
        $requserconn->execute(array($idconn, $mdpconn));

        if ($requserconn->rowCount() == 1) {
            $userinfo = $requserconn->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['identifiant'] = $userinfo['identifiant'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: index.php");
            exit();
        } else {
            $erreur = "Identifiant ou mot de passe incorrect.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}

// User Registration
if (isset($_POST['reguser'])) {
    $identifiant = htmlspecialchars(trim($_POST['identifiant']));
    $email = htmlspecialchars(trim($_POST['email']));
    $emailconf = htmlspecialchars(trim($_POST['emailconf']));
    $password_1 = sha1($_POST['password_1']);
    $password_2 = sha1($_POST['password_2']);

    if (!empty($identifiant) && !empty($email) && !empty($emailconf) && !empty($_POST['password_1']) && !empty($_POST['password_2'])) {
        if (strlen($identifiant) <= 255) {
            if ($email === $emailconf) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $db->prepare("SELECT * FROM utilisateurs WHERE mail = ? LIMIT 1");
                    $reqmail->execute(array($email));

                    if ($reqmail->rowCount() == 0) {
                        if ($_POST['password_1'] === $_POST['password_2']) {
                            $req = $db->prepare("INSERT INTO utilisateurs (identifiant, mail, mot_de_passe) VALUES (?, ?, ?)");
                            $req->execute(array($identifiant, $email, $password_1));
                            header("Location: connexion.php?registered=1");
                            exit();
                        } else {
                            $erreur = "Les mots de passe ne correspondent pas.";
                        }
                    } else {
                        $erreur = "Cette adresse e-mail est déjà utilisée.";
                    }
                } else {
                    $erreur = "Adresse e-mail invalide.";
                }
            } else {
                $erreur = "Les adresses e-mail ne correspondent pas.";
            }
        } else {
            $erreur = "L'identifiant ne doit pas dépasser 255 caractères.";
        }
    } else {
        $erreur = "Tous les champs sont obligatoires.";
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . url('index.php'));
    exit();
}
?>