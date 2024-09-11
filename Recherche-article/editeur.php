<?php

require_once(__DIR__ . '/settings.php');

if (isset($_GET['code-editeur'])) {
  $code_editeur = $_GET['code-editeur'];
} else {
  exit("code éditeur introuvable");
}


$sql_article_editeur = "SELECT art.cdedi, art.ean13, titre, auteur, pxpub
FROM edinew
INNER JOIN art ON edinew.cdedi = art.cdedi
WHERE edinew.cdedi = :cdedi";

$article_editeur = $pdo->prepare($sql_article_editeur);
$article_editeur->bindParam(':cdedi', $code_editeur);
$article_editeur->execute();
$article_editeur_lignes = $article_editeur->fetchAll();
var_dump($article_editeur_lignes);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informations éditeur</title>
</head>

<body>
  <h1>Code éditeur : <?php echo $_GET['code-editeur']; ?></h1>

  <div class="container">
    <div class="editeur">
      <table class="table-editeur" border="2" cellpadding="10" cellspacing="4" style="text-align: center">
        <tbody>
          <tr>
            <th>Code éditeur</th>
            <td><?php echo $editeurLignes['cdedi']; ?></td>
          </tr>
          <tr>
            <th>Nom éditeur</th>
            <td><?php echo $editeurLignes['nomedi']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 1</th>
            <td><?php echo $editeurLignes['adres1']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 2</th>
            <td><?php echo $editeurLignes['adres2']; ?></td>
          </tr>
          <tr>
            <th>Adresse éditeur 3</th>
            <td><?php echo $editeurLignes['adres3']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>