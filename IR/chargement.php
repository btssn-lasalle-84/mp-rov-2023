<?php
include 'identifiant_bdd.php';
$connection = mysqli_connect($iden, $nom_utilisateur, $mot_de_passe, $nom_bdd);

    // Vérification de la connexion
    if (mysqli_connect_errno()) {
        die("Connexion échouée: " . mysqli_connect_error());
    }

    $connection->set_charset("utf8");
    $requete = "SELECT* FROM data";
    //$row = mysqli_num_rows($requete);
    $resultat = $connection->query($requete);
    while ($ligne = $resultat->fetch_assoc())
    {
        echo "<tr> <td style=\"border:1px solid black;\">". $ligne['id'] .  " </td> <td style=\"border:1px solid black;\"> " . $ligne['temperature'] . " C°</td> <td style=\"border:1px solid black;\">" . $ligne['humidité'] . " %</td> <td style=\"border:1px solid black;\">" . $ligne['date'] . " </td> <td style=\"border:1px solid black;\">" . $ligne['heure'] .' </td> </tr>';
    }   
    
    // Fermeture de la connexion à la base de données
    mysqli_close($connection);
?>


<style>
#tableau {
     margin: 0 auto;
     width: 300px;
     height: 100px;
}
</style>