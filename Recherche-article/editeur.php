<?php

require_once(__DIR__ . '/settings.php');

if (isset($_GET['code-editeur'])) {
  $code_editeur = $_GET['code-editeur'];
} else {
  exit("code éditeur introuvable");
}


$sql_code_editeur = "SELECT art.cdedi, art.ean13, titre, auteur, pxpub, nomedi, adres1, adres2, adres3
FROM edinew
INNER JOIN art ON edinew.cdedi = art.cdedi
WHERE edinew.cdedi = :cdedi";

$article_editeur = $pdo->prepare($sql_code_editeur);
$article_editeur->bindParam(':cdedi', $code_editeur);
$article_editeur->execute();
$article_editeur_lignes = $article_editeur->fetch();
// var_dump($article_editeur_lignes);


$sql_articles_editeur = "SELECT art.ean13, titre, auteur, pxpub
FROM art
WHERE art.cdedi = :cdedi";

$all_articles_editeur = $pdo->prepare($sql_articles_editeur);
$all_articles_editeur->bindParam(':cdedi', $code_editeur);
$all_articles_editeur->execute();
$all_articles_editeur_lignes = $all_articles_editeur->fetchAll();
// var_dump($all_articles_editeur_lignes);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/editeur_style.css">
  <title>Informations éditeur</title>
</head>

<body>
  <h1>Code éditeur : <?php echo $_GET['code-editeur']; ?></h1>

  <div class="container">
    <div class="editeur">
      <table class="table-editeur" border="2" cellpadding="10" cellspacing="4" style="text-align: center">
        <tbody class="actuel-editeur">
          <tr>
            <th>Code éditeur</th>
            <td><?php echo $article_editeur_lignes['cdedi']; ?></td>
          </tr>
          <tr>
            <th>Nom éditeur</th>
            <td><?php echo $article_editeur_lignes['nomedi']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 1</th>
            <td><?php echo $article_editeur_lignes['adres1']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 2</th>
            <td><?php echo $article_editeur_lignes['adres2']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 3</th>
            <td><?php echo $article_editeur_lignes['adres3']; ?></td>
          </tr>
          <tr>
            <th>EAN</th>
            <td><?php echo $article_editeur_lignes['ean13']; ?></td>
          </tr>
          <tr>
            <th>Titre</th>
            <td><?php echo $article_editeur_lignes['titre']; ?></td>
          </tr>
          <tr>
            <th>Auteur</th>
            <td><?php echo $article_editeur_lignes['auteur']; ?></td>
          </tr>
          <tr>
            <th>Prix</th>
            <td><?php echo $article_editeur_lignes['pxpub'] . ' €'; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="more-articles">
      <table class="more-articles" border="2"
        cellpadding="10"
        cellspacing="4"
        style="text-align: center">
        <thead>
          <tr>
            <th>EAN</th>
            <th>Titres</th>
            <th>Auteur</th>
            <th>Prix</th>
          </tr>
        </thead>

        <tbody class="all-articles">
          <?php foreach ($all_articles_editeur_lignes as $line) { ?>
            <tr>
              <td class="ean"><a href="informations.php?ean=<?php echo $line['ean13']; ?>" target=" _blank">
                  <?php echo $line['ean13']; ?></td>
              <td><?php echo $line["titre"] ?></td>
              <td><?php echo $line["auteur"] ?></td>
              <td><?php echo $line["pxpub"] . ' €'; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>