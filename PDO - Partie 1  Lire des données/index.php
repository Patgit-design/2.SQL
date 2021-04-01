<?php

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost:8889;dbname=colyseum;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
//on récup les donnees de la BD
$resultat = $bdd->query("SELECT * FROM clients");

while ($donnees = $resultat->fetch()) {
    echo $donnees['lastName'] . ' ' . $donnees['firstName'] . ' ' . $donnees['birthDate'];
    echo "<br>";
}

$resultat = $bdd->query("SELECT * FROM showtypes");

while ($donnees = $resultat->fetch()) {
    echo $donnees['type'];
    echo "<br>";
}

$resultat = $bdd->query("SELECT * FROM clients LIMIT 0, 20");

while ($donnees = $resultat->fetch()) {
    echo $donnees['lastName'];
    echo "<br>";
}

$resultat = $bdd->query("SELECT * FROM clients WHERE card = 1");

while ($donnees = $resultat->fetch()) {
    echo $donnees['lastName'];
    echo "<br>";
}

$resultat = $bdd->query("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName");

while ($donnees = $resultat->fetch()) {
    echo "Nom: " . $donnees['lastName'] . "<br>" . "Prénom: " . $donnees['firstName'];
    echo "<br>";
}


$resultat = $bdd->query("SELECT * FROM shows ORDER BY title");

while ($donnees = $resultat->fetch()) {
    echo ": " . $donnees['title'] . " par " . $donnees['performer'] . ", le " . $donnees['date'] . " à " . $donnees['startTime'] . ".";
    echo "<br>";
}

"<p>Nom : *Nom de famille du client*<br>
Prénom : *Prénom du client*<br>
Date de naissance : *Date de naissance du client*<br>
Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*<br>
Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*<br>";

$resultat = $bdd->query("SELECT * FROM clients");

while ($donnees = $resultat->fetch()) {
    echo "Nom: " . $donnees['lastName'] . "<br>" . "Prénom: " . $donnees['firstName'] . "<br>" . "Date de naissance: " .
        $donnees['birthDate'] . "<br>";

    echo $donnees['card'] == 1 ? "Carte de fidelité: OUI" . "<br>" : "Carte de fidelité: NON" . "<br>";
    echo $donnees['cardNumber'] !== NULL ? "Numéro de la carte:" . $donnees['cardNumber'] : "Le client n'a pas de carte";




    echo "<br>";
}