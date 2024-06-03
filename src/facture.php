<?php
// Démarrer la session
session_start();
// supprime les articles de la page
session_destroy();
include 'bddconnect/bdd.php';

// implémentation des models
include_once "models/Produit.php";
include_once "models/ImageProduit.php";

// établir la connexion avec la bdd
$bdd = new Bdd();
$db = $bdd->connectoBdd();

// initialisation des models
$produit = new Produit($db);
$image_produit = new ImageProduit($db);

// titre de la page
$titre_page = "Facture - Foodtastic";

ob_start();
?>
<style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        color: #717375;
        font-size: 12pt;
        font-family: helvetica;
        line-height: 6mm;
        letter-spacing: 2mm;
    }
    hr {
        background: #717375;
        height: 1px;
        border: none;
    }
    .hr_footer {
        border: 1px dashed;
    }
    strong {
        color: #000;
    }
    em {
        font-size: 9pt;
    }
    h1, h4 {
        color: #000;
        margin: 0;
        padding: 0;
    }
    td.right {
        text-align: right;
    }
    table.border td {
        border: 1px solid #CFD1D2;
        padding: 3mm 1mm;
    }
    table.border th, td.black {
        background: #000;
        color: #FFF;
        font-weight: normal;
        border: solid 1px #FFF;
        padding: 1mm 1mm;
        text-align: left;
    }
    td.noborder {
        border: none;
    }
</style>

<page backtop="30mm" backleft="10mm" backright="10mm" backbottom="30mm" footer="page; date;">
    <page_header>
        <h1>Foodtastic Maketplace Receipt</h1>
        <hr/>
    </page_header>
    <page_footer>
        <hr class="hr_footer" />
        <table>
            <tr>
                <td><qrcode value="Value to Coder" ec="M" style="width: 25mm; background-color: white; color: black;"></qrcode></td>
                <td><h1>Bon de commande par Foodtastic</h1>
                    <p>Date : <?php echo date('d/m/Y'); ?></p></td>
            </tr>
        </table>
    </page_footer>
    <bookmark title="Informations" level="1"></bookmark>
    <table style="vertical-align: top;">
        <tr>
            <td style="width: 75%;">
                <strong>Identifiant d'achat : </strong><?php echo $_SESSION['identifiant']; ?><br>
                <strong>Adresse : </strong><br>
                <strong>Contact : </strong>
            </td>
            <td style="width: 25%;">
                <strong><?php echo $_SESSION['identifiant']; ?></strong><br>
                <p>Infos : XXXXXX XXXXXX</p>
            </td>
        </tr>
    </table>
    <table style="vertical-align: bottom; margin-top: 20mm;">
        <tr>
            <td style="width: 50%;"><h1>Devis N°... de <?php echo $_SESSION['identifiant']; ?></h1></td>
            <td style="width: 50%;" class="right">Émis le <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table><br>
    <bookmark title="Détails" level="1"></bookmark>
    <table class="border">
        <thead>
        <tr>
            <th style="width: 60%;">Description</th>
            <th style="width: 12%;">Quantité</th>
            <th style="width: 15%;">Prix unitaire</th>
            <th style="width: 12%;">Montant</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
            // récupérer les ids des produits
            $ids = array();
            foreach ($_SESSION['panier'] as $id => $value) {
                array_push($ids, $id);
            } // fin foreach
            $decl = $produit->lireParIds($ids);

            $total = 0;
            $article_compter = 0;

            while ($ligne = $decl->fetch(PDO::FETCH_ASSOC)) {
                extract($ligne);

                $quantite = $_SESSION['panier'][$id]['quantite'];
                $montant_total = $prixprod * $quantite;
                ?>
                <tr>
                    <td><?php echo $ligne['nomprod']; ?></td>
                    <td><?php echo $quantite > 1 ? "{$quantite} articles" : "{$quantite} article"; ?></td>
                    <td><?php echo number_format($prixprod, 2, '.', ','); ?> €</td>
                    <td><?php echo number_format($montant_total, 2, '.', ','); ?> €</td>
                </tr>
                <?php
                $article_compter += $quantite;
                $total += $montant_total;
            }
        } else {
            echo "<tr><td colspan='4'>Aucun article dans le panier.</td></tr>";
        }
        ?>
        <tr>
            <td colspan="2" class="noborder" style="padding: 1mm";></td>
            <td class="black" style="padding: 1mm;">Total : </td>
            <td style="padding: 1mm;"><?php echo number_format($total, 2, '.', ','); ?> €</td>
        </tr>
        </tbody>
    </table>
</page>
<?php
$content = ob_get_clean();

require_once __DIR__ . '/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('FMReceipt.pdf', 'D');
} catch (Html2PdfException $e) {
    die($e);
}
