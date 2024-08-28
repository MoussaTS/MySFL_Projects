<?php

function isValidRecipe(array $recipe) : bool
{
  if (array_key_exists('is_enabled', $recipe)) {
    $isEnabled = $recipe['is_enabled'];
  } else {
    $isEnabled = false;
  }

  return $isEnabled;
}

// 2 exemples
$romanSalad = [
  'title' => 'Salade Romaine',
  'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
  'author' => 'laurene.castor@exemple.com',
  'is_enabled' => true,
];

$sushis = [
  'title' => 'Sushis',
  'recipe' => 'Etape 1 : du saumon ; Etape 2 : du riz',
  'author' => 'laurene.castor@exemple.com',
  'is_enabled' => false,
];


// Répond true !
$isRomandSaladValid = isValidRecipe($romanSalad);

// Répond false !
$isSushisValid = isValidRecipe($sushis);
// echo $isRomandSaladValid;
// echo $isSushisValid;

$recipes = [ // Les recettes
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

// AVANT

// foreach ($recipes as $recipe) {
//     if ($recipe['is_enabled']) {
//         // echo $recipe['title'] ..
//     }
// }

// APRES

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}

// construire l'affichage HTML des recettes
foreach(getRecipes($recipes) as $recipe) {
     echo $recipe['title'] . ' '; 
}
?>

