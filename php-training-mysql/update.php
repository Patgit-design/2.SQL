<?php
require 'connect.php';
$pdoStat = $bdd->prepare('SELECT * FROM hiking WHERE id = :num');

//liaison du parametre num(id dans l url)

$pdoStat->bindValue(':num', $_GET['numRando'], PDO::PARAM_INT);

//if(isset($_POST['update'])) {
//exdecution de la requete

$executeIsOk = $pdoStat->execute();

//on recupère les infos de la rando

$rando = $pdoStat->fetch();
var_dump($rando);



//}
//header('Location: read.php');



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modifier une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
    <a href="read.php">Liste des données</a>
    <h1>Modifier</h1>
    <form action="updateRando.php" method="post">
        <input type="text" name="numRando" value="<?= $rando['id'] ?>">



        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?= $rando['name_rand']; ?>">
        </div>

        <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty">
                <option value="<?= $rando['difficulty']; ?>"></option>
                <option value=" très facile">Très facile</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
                <option value="très difficile">Très difficile</option>
            </select>
        </div>

        <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="<?= $rando['distance']; ?>">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="duration" name="duration" value="<?= $rando['duration']; ?>">
        </div>
        <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="<?= $rando['height_difference']; ?>">
        </div>
        <button type="submit" name="update" onclick="window.location.href='update.php';">Appliquer les
            modifications</button>
    </form>
</body>

</html>