<?php
require_once __DIR__ . '/../includes/config.php';

if (!isset($_SESSION['id'])) {
    header('Location: ' . url('connexion.php'));
    exit();
}

$user_id = $_SESSION['id'];
$erreur = "";
$success = "";

// Handle updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nvpseudo = htmlspecialchars(trim($_POST['nvpseudo']));
    $nvmail = htmlspecialchars(trim($_POST['nvmail']));
    $mdp1 = $_POST['nvmdp1'];
    $mdp2 = $_POST['nvmdp2'];

    if (!empty($nvpseudo) && !empty($nvmail)) {
        // Update basic info
        $upd = $db->prepare("UPDATE utilisateurs SET identifiant = ?, mail = ? WHERE id = ?");
        $upd->execute([$nvpseudo, $nvmail, $user_id]);
        $_SESSION['identifiant'] = $nvpseudo;
        $_SESSION['mail'] = $nvmail;
        $success = "Profil mis à jour avec succès.";

        // Update password if provided
        if (!empty($mdp1)) {
            if ($mdp1 === $mdp2) {
                $upd_pass = $db->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE id = ?");
                $upd_pass->execute([sha1($mdp1), $user_id]);
                $success .= " Mot de passe modifié.";
            } else {
                $erreur = "Les mots de passe ne correspondent pas.";
            }
        }
    } else {
        $erreur = "Le pseudo et l'email sont obligatoires.";
    }
}

$titre_page = "Éditer mon profil - Foodtastic";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg animate__animated animate__fadeIn">
            <div class="card-body p-5">
                <h1 class="font-weight-bold mb-4">Éditer mon profil</h1>

                <?php if ($success): ?>
                    <div class="alert alert-success animate__animated animate__slideInDown">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                <?php if ($erreur): ?>
                    <div class="alert alert-danger animate__animated animate__shakeX">
                        <?php echo $erreur; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="form-group mb-4">
                        <label class="small font-weight-bold text-muted text-uppercase">Identifiant</label>
                        <input type="text" name="nvpseudo" class="form-control bg-light"
                            value="<?php echo $_SESSION['identifiant']; ?>" required>
                    </div>

                    <div class="form-group mb-4">
                        <label class="small font-weight-bold text-muted text-uppercase">Email</label>
                        <input type="email" name="nvmail" class="form-control bg-light"
                            value="<?php echo $_SESSION['mail']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted text-uppercase">Nouveau mot de
                                    passe</label>
                                <input type="password" name="nvmdp1" class="form-control bg-light"
                                    placeholder="Laisser vide si inchangé">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="small font-weight-bold text-muted text-uppercase">Confirmer le mot de
                                    passe</label>
                                <input type="password" name="nvmdp2" class="form-control bg-light"
                                    placeholder="Laisser vide si inchangé">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary btn-pill px-5 shadow">Enregistrer</button>
                        <a href="profil.php" class="btn btn-outline-secondary btn-pill px-4">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>