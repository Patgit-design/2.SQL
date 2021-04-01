<?php
include('connect.php');

$pdoStat = $bdd->prepare('UPDATE hiking set name_rand = :name_rand, difficulty = :difficulty
distance = :distance, duration = :duration, height_difference = :height_difference
WHERE id= :num LIMIT 1');

//liaison avec le parametre nommé

$pdoStat->bindValue(':num', $_POST['numRando'], PDO::PARAM_INT);
$pdoStat->bindValue(':name_rand', $_POST['name'], PDO::PARAM_STR);
$pdoStat->bindValue(':difficulty', $_POST['difficulty'], PDO::PARAM_STR);
$pdoStat->bindValue(':distance', $_POST['distance'], PDO::PARAM_STR);
$pdoStat->bindValue(':duration', $_POST['duration'], PDO::PARAM_STR);
$pdoStat->bindValue(':height_difference', $_POST['height_difference'], PDO::PARAM_INT);


//executer
$executeIsOk = $pdoStat->execute();


if ($executeIsOk) {
    echo $message = 'La rando a bien été mise à jour';
} else {
    echo $message = 'Echec de la mise à jour';
}
