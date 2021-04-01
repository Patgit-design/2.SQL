<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
    <a href="read.php">Liste des données</a>
    <h1>Ajouter</h1>
    <form action="create_POST.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="">
        </div>

        <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty">
                <option value="très facile">Très facile</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
                <option value="très difficile">Très difficile</option>
            </select>
        </div>

        <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="time" name="duration" value="">
        </div>
        <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="">
        </div>
        <button type="submit" name="button" onClick="alert('Votre rando est enregistrée')">Envoyer</button>
    </form>
    <?php
	// Récupération des 10 derniers messages
	$reponse = $bdd->query('SELECT * FROM hiking');
	/*
	// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
	while ($donnees = $reponse->fetch()) {
		echo '<p><strong>' . htmlspecialchars($donnees['name']) . '</strong> : ' . htmlspecialchars($donnees['difficulty']) . '</p>';
	}*/


	$reponse->closeCursor();
	?>
</body>

</html>