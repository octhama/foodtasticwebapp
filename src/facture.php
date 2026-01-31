<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// NOTE: We do NOT destroy the session here because the user might want to download the invoice AGAIN
// or continue shopping. In a real app, you would fetch order details from the database by ID,
// not from the session cart. But keeping consistent with existing logic for now.

require_once __DIR__ . "/bddconnect/bdd.php";
require_once __DIR__ . "/models/Produit.php";
require_once __DIR__ . "/models/ImageProduit.php";

$bdd = new Bdd();
$db = $bdd->connectoBdd();
$produit = new Produit($db);

ob_start();
?>
<style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        color: #333;
        font-size: 10pt;
        font-family: helvetica;
    }

    strong {
        color: #000;
    }

    h1 {
        color: #2D6A4F;
        font-size: 16pt;
        margin: 0;
    }

    h4 {
        margin: 0;
    }

    .header-table td {
        vertical-align: middle;
    }

    .items-table th {
        background-color: #2D6A4F;
        color: #FFF;
        padding: 8px;
        font-weight: bold;
        text-align: left;
    }

    .items-table td {
        border-bottom: 1px solid #EEE;
        padding: 8px;
    }

    .total-row td {
        border-top: 2px solid #2D6A4F;
        font-weight: bold;
        font-size: 12pt;
        padding-top: 10px;
    }

    .footer {
        font-size: 8pt;
        color: #777;
        border-top: 1px solid #CCC;
        padding-top: 10px;
        margin-top: 30px;
        text-align: center;
    }
</style>

<page backtop="20mm" backleft="15mm" backright="15mm" backbottom="20mm">
    <!-- Header -->
    <table class="header-table" style="width: 100%; margin-bottom: 30px;">
        <tr>
            <td style="width: 50%;">
                <h1 style="font-size: 24pt;">Foodtastic</h1>
                <p style="color: #555;">Marché frais & local</p>
            </td>
            <td style="width: 50%; text-align: right;">
                <h4>Facture N° <?php echo date('Ymd') . '-' . rand(100, 999); ?></h4>
                <p>Date : <?php echo date('d/m/Y'); ?></p>
            </td>
        </tr>
    </table>

    <!-- Client Info -->
    <div style="background: #F8F9FA; padding: 15px; margin-bottom: 30px; border-radius: 5px; border: 1px solid #EEE;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <strong>Émetteur :</strong><br>
                    Foodtastic Market<br>
                    535 Avenue Louise<br>
                    1050 Bruxelles, Belgique<br>
                    TVA: BE 0123 456 789
                </td>
                <td style="width: 50%; text-align: right;">
                    <strong>Client :</strong><br>
                    <?php echo isset($_SESSION['identifiant']) ? $_SESSION['identifiant'] : 'Client invité'; ?><br>
                    <?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : ''; ?>
                </td>
            </tr>
        </table>
    </div>

    <!-- Items -->
    <table class="items-table" style="width: 100%; margin-bottom: 20px;">
        <thead>
            <tr>
                <th style="width: 55%;">Désignation</th>
                <th style="width: 15%; text-align: center;">Qté</th>
                <th style="width: 15%; text-align: right;">P.U.</th>
                <th style="width: 15%; text-align: right;">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_ht = 0;

            if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
                $ids = array_keys($_SESSION['panier']);
                $decl = $produit->lireParIds($ids);

                while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)) {
                    extract($ligne);
                    $quantite = $_SESSION['panier'][$id]['quantite'];
                    $montant_ligne = $prixprod * $quantite;
                    $total_ht += $montant_ligne;
                    ?>
                    <tr>
                        <td style="width: 55%;"><?php echo $nomprod; ?></td>
                        <td style="width: 15%; text-align: center;"><?php echo $quantite; ?></td>
                        <td style="width: 15%; text-align: right;"><?php echo number_format($prixprod, 2, ',', ' '); ?> €</td>
                        <td style="width: 15%; text-align: right;"><?php echo number_format($montant_ligne, 2, ',', ' '); ?> €
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="4" style="text-align: center; padding: 20px;">Aucun article facturé</td></tr>';
            }

            $tva_rate = 0.21; // Example 21%
            $tva_amount = $total_ht * $tva_rate;
            $total_ttc = $total_ht + $tva_amount;
            ?>
        </tbody>
    </table>

    <!-- Totals -->
    <table style="width: 100%;">
        <tr>
            <td style="width: 60%;"></td>
            <td style="width: 40%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: right; padding: 5px;">Total HT :</td>
                        <td style="text-align: right; padding: 5px;">
                            <?php echo number_format($total_ht, 2, ',', ' '); ?> €</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 5px;">TVA (21%) :</td>
                        <td style="text-align: right; padding: 5px;">
                            <?php echo number_format($tva_amount, 2, ',', ' '); ?> €</td>
                    </tr>
                    <tr class="total-row">
                        <td style="text-align: right; padding: 10px; color: #2D6A4F;">Total TTC :</td>
                        <td style="text-align: right; padding: 10px; color: #2D6A4F;">
                            <?php echo number_format($total_ttc, 2, ',', ' '); ?> €</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="footer">
        Merci pour votre confiance !<br>
        Foodtastic Market - SAS au capital de 10 000 € - RCS Bruxelles B 123 456
    </div>
</page>
<?php
$content = ob_get_clean();

// Check if vendor exists in root or src (adjusting for common setups)
$vendor_path = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($vendor_path)) {
    // Try the specific location from previous file view if likely
    $vendor_path = __DIR__ . '/html2pdf/vendor/autoload.php';
}

if (file_exists($vendor_path)) {
    require_once $vendor_path;
} else {
    // If we can't find autoload, we can't generate PDF. Fallback to HTML view or Error.
    // For this context, let's assume the user has the lib or we use the relative path found in original file
    require_once __DIR__ . '/html2pdf/vendor/autoload.php';
}

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;

try {
    $pdf = new Html2Pdf('P', 'A4', 'fr');
    $pdf->writeHTML($content);
    $pdf->output('Facture_Foodtastic.pdf', 'I'); // I = Inline view, D = Download
} catch (Html2PdfException $e) {
    echo "Erreur de génération PDF : " . $e->getMessage();
}
?>