<?php

require_once(__DIR__ . '/settings.php');


if(isset($_GET['ean'])) {
  $ean = $_GET['ean'];
} else {
  exit ("EAN introuvable.");
}

$sql = "SELECT art.cdedi, art.ean13, titre, auteur, cdfam, pxpub, cdtva, art.dtdermaj, nomedi, edinew.adres1, edinew.adres2, edinew.adres3, auto_retour, cddis, col_matchcli, cdcli, nomcli, cli.adres1 as cliadres1, cli.adres2 as cliadres2, cli.adres3 as cliadres3
FROM art
INNER JOIN edinew ON edinew.cdedi = art.cdedi
LEFT JOIN art_complement ON art_complement.ean13 = :ean 
LEFT JOIN cli ON edinew.cddis = cli.cdcli
WHERE art.ean13 = :ean";

$articles = $pdo->prepare($sql);
$articles->bindParam(':ean', $ean);
$articles->execute();
$articlesLignes = $articles->fetch();
//var_dump($articlesLignes);

if (count($articlesLignes) === 0) {
  exit ("EAN introuvable.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Recherche d'article - Plus d'informations</title>
</head>
<body>
  <div class="container">
    <div class="table-information-article1">
      <table class="informations" border="2" cellpadding="10" cellspacing="4" style="text-align: center">
        <tbody>
          <tr>
            <th>Code éditeur</th>
            <td><?php echo $articlesLignes['cdedi']; ?></td>
          </tr>
          <tr>
            <th>Nom éditeur</th>
            <td><?php echo $articlesLignes['nomedi']; ?></td>
          </tr>
          <tr>
            <th>EAN</th>
            <td><?php echo $articlesLignes['ean13']; ?></td>
          </tr>
          <tr>
            <th>Titre</th>
            <td><?php echo $articlesLignes['titre']; ?></td>
          </tr>
          <tr>
            <th>Auteur</th>
            <td><?php echo $articlesLignes['auteur']; ?></td>
          </tr>
          <tr>
            <th>Code famille</th>
            <td><?php echo $articlesLignes['cdfam']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 1</th>
            <td><?php echo $articlesLignes['adres1'];?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 2</th>
            <td><?php echo $articlesLignes['adres2'];?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 3</th>
            <td><?php echo $articlesLignes['adres3']; ?></td>
          </tr>
          <tr>
            <th>Prix</th>
            <td><?php echo $articlesLignes['pxpub'] . ' €'; ?></td>
          </tr>
          <tr>
            <th>TVA</th>
            <td><?php echo $articlesLignes['cdtva']; ?></td>
          </tr>
          <tr>
            <th>Dernière mise à jour</th>
            <td><?php echo $articlesLignes['dtdermaj']; ?></td>
          </tr>
          <tr>
            <th>Retour</th>
            <td><?php if ($articlesLignes['auto_retour'] === 'O') {
              echo 'Autorisé';
            } elseif ($articlesLignes['auto_retour'] === 'I') {
              echo 'Non autorisé';
            } else echo 'Demande d\'autorisation du fournisseur'; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-information-article2">
      <table class="informations" border="2" cellpadding="10" cellspacing="4" style="text-align: center">
      <tbody>
          <tr>
            <th>Match</th>
            <td><?php echo $articlesLignes['col_matchcli']; ?></td>
          </tr>
          <tr>
            <th>Code client</th>
            <td><?php echo $articlesLignes['cdcli']; ?></td>
          </tr>
          <tr>
            <th>Nom client</th>
            <td><?php echo $articlesLignes['nomcli']; ?></td>
          </tr>
          <th>Adresse fournisseur 1</th>
            <td><?php echo $articlesLignes['cliadres1'];?></td>
          </tr>
          <tr>
            <th>Adresse fournisseur 2</th>
            <td><?php echo $articlesLignes['cliadres2'];?></td>
          </tr>
          <tr>
            <th>Adresse fournisseur 3</th>
            <td><?php echo $articlesLignes['cliadres3']; ?></td>
          </tr>
      </table>
    </div>
  </div>
</body>
</html>