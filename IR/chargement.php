<?php
    include 'identifiant_bdd.php';

    $connexionBdd = mysqli_connect($identifiant, $nom_utilisateur, $mot_de_passe, $nom_bdd);

    // Vérification de la connexion
    if (mysqli_connect_errno())
    {
        die("Connexion échouée: " . mysqli_connect_error());
    }

    $lecture_toute_la_base = "SELECT * FROM data";
    $resultat = $connexionBdd->query($lecture_toute_la_base);

    echo mysqli_get_server_info($connexionBdd);

    while ($lectureDonnéeDansTableau = $resultat->fetch_assoc())
    {
        echo "<tr> <td style=\"border:1px solid black;\">". $lectureDonnéeDansTableau['id'] .  " </td> <td style=\"border:1px solid black;\"> " . $lectureDonnéeDansTableau['temperature'] . " C°</td> <td style=\"border:1px solid black;\">" . $lectureDonnéeDansTableau['humidité'] . " %</td> <td style=\"border:1px solid black;\">" . $lectureDonnéeDansTableau['date'] . " </td> <td style=\"border:1px solid black;\">" . $lectureDonnéeDansTableau['heure'] .' </td> </tr>';
    }   
    
    // Fermeture de la connexion à la base de données
    mysqli_close($connexionBdd);
?>