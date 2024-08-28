<?php

// Premier utilisateur
$userName1 = 'Mickaël Andrieu';
$userEmail1 = 'mickael.andrieu@exemple.com';
$userPassword1 = 'S3cr3t';
$userAge1 = 34;

// Deuxième utilisatrice
$userName2 = 'Laurène Castor';
$userEmail2 = 'laurene.castor@exemple.com';
$userPassword2 = 'P4ssW0rD';
$userAge2 = 28;

// ... et ainsi de suite pour les autres utilisateurs.

// $lines = 1;

// while ($lines <= 100){
//   echo 'Ceci est la ligne n°' . $lines . '<br />';
//   $lines++;
// }

$users = [
  [
      'full_name' => 'Mickaël Andrieu',
      'email' => 'mickael.andrieu@exemple.com',
      'age' => 34,
  ],
  [
      'full_name' => 'Mathieu Nebra',
      'email' => 'mathieu.nebra@exemple.com',
      'age' => 34,
  ],
  [
      'full_name' => 'Laurène Castor',
      'email' => 'laurene.castor@exemple.com',
      'age' => 28,
  ],
];

//$lines = 3; // nombre d'utilisateurs dans le tableau
// $counter = 0;

// while ($counter < $lines) {
//   // echo $users[$counter]['full_name'] . ' ' . $users[$counter]['email'] . '<br />';
//   // $counter++;

//   // La même chose en for (à utilisé si on connait le nombre de boucle à l'avance)
//   // for (initialisation variable; condition; incrémentation)
// }
// for ($lines = 0; $lines <= 2; $lines++)
// {
//   echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br />';
// }
?>