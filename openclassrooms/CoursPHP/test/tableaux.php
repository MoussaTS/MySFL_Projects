<?php

// $recipes = ['Cassoulet', 'Couscous', 'Escalope Milanaise', 'Salade César',];

// // La fonction array permet aussi de créer un array
// $recipes = array('Cassoulet', 'Couscous', 'Escalope Milanaise');
?>

<?php
// $recipes[0] = 'Cassoulet';
// $recipes[1] = 'Couscous';
// $recipes[2] = 'Escalope Milanaise';
?>

<?php
// $recipes[] = 'Cassoulet'; // Créera $recipes[0]
// $recipes[] = 'Couscous'; // Créera $recipes[1]
// $recipes[] = 'Escalope Milanaise'; // Créera $recipes[2]
?>

<?php
// Une bien meilleure façon de stocker une recette !
// $recipe = [
//     'title' => 'Cassoulet',
//     'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
//     'author' => 'john.doe@exemple.com',
//     'enabled' => true,
// ];

?>

//<?php
//$recipe['title'] = 'Cassoulet';
//$recipe['recipe'] = 'Etape 1 : des flageolets, Etape 2 : ...';
//$recipe['author'] = 'john.doe@exemple.com';
//$recipe['enable'] = true;
//?>

<?php

// // Déclaration du tableau des recettes
// $recipes = [
//     ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
//     ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
// ];

// foreach ($recipes as $recipe) {
//     echo $recipe[0]; // Affichera Cassoulet, puis Couscous
// }
// ?>
// <?php
// $recipe = [
//     'title' => 'Cassoulet',
//     'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
//     'author' => 'mickael.andrieu@exemple.com',
//     'enabled' => true,
// ];

// foreach ($recipe as $value) {
//     echo $value;
// }

// /**
//  * AFFICHE
//  * CassouletEtape 1 : des flageolets, Etape 2 : ...mickael.andrieu@exemple.com1
//  */
// ?>

<?php

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => '',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];
// foreach($recipes as $recipe) {
//     echo $recipe['title'] . ' contribué(e) par : ' . $recipe['author'] . PHP_EOL; 
// }
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h1>Affichage recettes</h1>
    <?php foreach ($recipes as $recipe) : ?>
      <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] == true) : ?>
        <article>
          <h3><?php echo $recipe['title']; ?></h3>
          <div><?php echo $recipe['recipe']; ?></div>
          <i><?php echo $recipe['author']; ?></i>
        </article>

        <?php endif; ?>
        <?php endforeach ?>
  </div>
</body>
</html>



// <?php
// $recipe = [
//     'title' => 'Salade Romaine',
//     'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
//     'author' => 'laurene.castor@exemple.com',
// ];

// foreach($recipe as $property => $propertyValue)
// {
//     echo '[' . $property . '] vaut ' . $propertyValue . PHP_EOL;
// }
// ?>

// <?php

// $recipes = [
//     [
//         'title' => 'Cassoulet',
//         'recipe' => '',
//         'author' => 'mickael.andrieu@exemple.com',
//         'is_enabled' => true,
//     ],
//     [
//         'title' => 'Couscous',
//         'recipe' => '',
//         'author' => 'mickael.andrieu@exemple.com',
//         'is_enabled' => false,
//     ],
// ];

// echo '<pre>'; //remplace la balise br pour print_r
// print_r($recipes);
// echo '</pre>';
// ?>