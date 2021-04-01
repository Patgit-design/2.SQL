<?php
//connect

include('connect.php');

// Insertion dans bd à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO hiking ( name_rand, difficulty, distance, duration, height_difference) VALUES(?, ?, ?, ?, ?)');
$req->execute(array($_POST['name'], $_POST['difficulty'], $_POST['distance'], $_POST['duration'], $_POST['height_difference']));


// Redirection du visiteur vers la page du minichat
header('Location: create.php');
