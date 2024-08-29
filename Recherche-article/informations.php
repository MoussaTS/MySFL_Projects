<?php

require_once(__DIR__ . '/settings.php');


if(isset($_GET['ean'])) {
  $ean = $_GET['ean'];
} else {
  exit ("EAN introuvable.");
}

$sql = "SELECT art.cdedi, art.ean13, titre, auteur, cdfam, pxpub, cdtva, art.dtdermaj, nomedi, adres1, adres2, adres3, auto_retour
FROM art
INNER JOIN edinew ON edinew.cdedi = art.cdedi
LEFT JOIN art_complement ON art_complement.ean13 = :ean 
WHERE art.ean13 = :ean";

$articles = $pdo->prepare($sql);
$articles->bindParam(':ean', $ean);
$articles->execute();
$articlesLignes = $articles->fetchAll();
var_dump($articlesLignes);

if (count($articlesLignes) === 0) {
  exit ("EAN introuvable.");
}

?>