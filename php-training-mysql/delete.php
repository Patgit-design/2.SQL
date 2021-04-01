<?php

/**** Supprimer une randonnée ****/
include 'connect.php';

$pdoStat = $bdd->prepare('DELETE FROM hiking WHERE id = :num LIMIT 1');


//liaison du parametre num(id dans l url)

$pdoStat->bindValue(':num', $_GET['numRando'], PDO::PARAM_INT);

//executer

$executeIsOk = $pdoStat->execute();

//test if else

if ($executeIsOk) {
    echo    $message = 'La rando a été supprimée';
} else {
    echo   $message = 'Echec de la suppression';
}
header('Location: read.php');
