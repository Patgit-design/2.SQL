<?php
include('connect.php');
?>
<?php
$resultat = $bdd->query('SELECT * FROM météo');

$req = $bdd->prepare('INSERT INTO météo ( ville, haut, bas) VALUES(?, ?, ?)');
$req->execute(array($_POST['ville'], $_POST['haut'], $_POST['bas']));

echo '<table class="table table-bordered">
    <colgroup span="3" class="columns"></colgroup>
     <tr>
        <th>Ville</th>
        <th>Haut</th>
        <th>Bas</th>
    </tr>';
echo '<form action="index.php" method="post">';
while ($donnees = $resultat->fetch()) {
    echo ' <tr>

        <td>' .  $donnees['ville'] . '<input type="checkbox" name="checkbox[]" value="' . $_POST['checkbox'] . '" /> . </td>
        <td>' . $donnees['haut'] . '</td>
        <td>' . $donnees['bas'] . '</td>
 </tr>';
}

echo ' <button type="delete" name="delete">Effacer</button>
 <button type="submit" name="button">Envoyer</button>';
echo '  <div>
            <label for="ville">Ville</label>
            <input type="text" name="ville" value="">
        </div>
        <div>
            <label for="haut">Haut</label>
            <input type="text" name="haut" value="">
        </div>
        <div>
            <label for="bas">Bas</label>
            <input type="text" name="bas" value="">
        </div>
        <button type="submit" name="button">Envoyer</button>
        <button type="delete" name="delete">Effacer</button>
    </form>';
if (isset($_POST['checkbox'])) {

    foreach ($_POST['checkbox'] as $checkbox) {
        $sql = $bdd->query("DELETE FROM météo WHERE ville='" . $checkbox . "'");
        echo $sql;
        echo '<br/>';
    }
}