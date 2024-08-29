<?php

require_once(__DIR__ . '/settings.php');
// var_dump($_POST);

// if(isset($_POST['search'])){
//   $search = $_POST['search'];
// }else{
//   $search = '';
// }

$search = '';
$sql = "SELECT art.cdedi, ean13, titre, auteur, cdfam, pxpub, cdtva, dtdermaj, nomedi, adres1, adres2, adres3
FROM art
INNER JOIN edinew ON edinew.cdedi = art.cdedi
WHERE ean13
LIKE :search OR titre
LIKE :search OR art.cdedi
LIKE :search";

if(isset($_POST['submit']) && $_POST['search'] != ''){
  $search = $_POST['search'];
  $articles = $pdo->prepare($sql);
  $articles->bindParam(':search', $search);
  $articles->execute();
  $articlesLignes = $articles->fetchAll();
  // var_dump($articlesLignes);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Recherche d'article</title>
</head>
<body>
  <header>
    <form action="" method="post">
      <!-- <label for="search">EAN</label> -->
      <input type="text" name="search" placeholder="Recherche" autocomplete="off" value="<?= $_POST['search']?? '' ?>">
      <input type="submit" name="submit" value="Valider"/>
    </form>
  </header>

  <?php if (isset($articlesLignes) && count($articlesLignes) > 0) {
    ?> 
    <div class="table">
      <table  border="2"
        cellpadding="10"
        cellspacing="4"
        style="text-align: center">
        <thead>
          <tr>
            <th>Code éditeur</th>
            <th>Nom éditeur</th>
            <th>EAN</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Plus d'informations</th>
            <!-- <th>Code famille</th>
            <th>Adresse 1</th>
            <th>Adresse 2</th>
            <th>Adresse 3</th>
            <th>Prix public</th>
            <th>TVA</th>
            <th>Dernière maj</th> -->
          </tr>
        </thead>
      
        <tbody>
          <?php foreach ($articlesLignes as $line) {
            echo '<tr><td>'.$line["cdedi"].'</td><td>'.$line["nomedi"].'</td><td>'.$line["ean13"].'</td><td>'.$line["titre"].'</td><td>'.$line["auteur"].'</td><td><a href="informations.php?ean='.$line["ean13"].'">+</a></td>';
          } ?>
        </tbody>
      </table>
    </div>
    <?php } elseif (isset($_POST['submit'])) {
      echo 'Aucun résultat trouvé.'; 
      }?>
    
  
</body>
</html>