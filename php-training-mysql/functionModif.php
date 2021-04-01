<?php
include('connect.php');

function modifRando($id)
{
$id = $_GET['id'];
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $diffHeight = $_POST['height_difference'];

    $ModifRando = $bdd->prepare("UPDATE hiking SET
 'name'= '$name',
 difficulty='$difficulty',
 distance='$distance',
 duration='$duration',
 height_difference = '$diffHeight'
 WHERE id= '$id'");

    $reponse->execute($ModifRando);

    print_r($name);
}