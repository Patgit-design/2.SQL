<?php

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost:8889;dbname=weather-app;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}