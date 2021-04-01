<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <?php
  // Récupération dans BDD
  $reponse = $bdd->query('SELECT * FROM hiking');
  $donnees = $reponse->fetch();
  ?>


  <h1>Liste des randonnées</h1>
  <?php
  // Afficher la liste des randonnées 


  echo "<table border='1'>\n";
  echo "<tr>\n";
  echo "<th><strong>Name</strong></th>\n";
  echo "<th><strong>Difficulty</strong></th>\n";
  echo "<th><strong>Distance</strong></th>\n";
  echo "<th><strong>Duration</strong></th>\n";
  echo "<th><strong>Height difference</strong></th>\n";
  echo "</tr>\n";
  while ($donnees = $reponse->fetch()) {

    echo '<tr>';
    echo '<td bgcolor="#CCCCCC">' . ' <a href="update.php?numRando=' . $donnees['id'] . ' ">Modifier</a>' . '<a href="delete.php?numRando=' . $donnees['id'] . ' ">Effacer</a>'
      . $donnees["name_rand"] . '</td>';
    echo '<td bgcolor="#CCCCCC">' . $donnees["difficulty"] . '</td>';
    echo '<td bgcolor="#CCCCCC">' . $donnees["distance"] . '</td>';
    echo '<td bgcolor="#CCCCCC">' . $donnees["duration"] . '</td>';
    echo '<td bgcolor="#CCCCCC">' . $donnees["height_difference"] . '</td>';
    echo '</tr>' . "\n";
  }
  echo '</table>' . "\n"; // fin du tableau.

  ?>
  <button class="favorite styled" type="button" onclick=window.location.href="create.php" ;>
    Ajouter une nouvelle rando
  </button>
</body>

</html>