<?php

 // Connexion à la base de données
 include 'utilisateur.php';
include 'identifiant_bdd.php';
$connection = mysqli_connect($iden, $nom_utilisateur, $mot_de_passe, $nom_bdd);

// Vérification de la connexion
if (mysqli_connect_errno()) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Ouverture du fichier texte
$filename = "data.txt";
$file = fopen($filename, "r");

// Lecture du fichier ligne par ligne
while (!feof($file)) {
    $line = fgets($file);
    // Vérification si la ligne commence par un dollar
    if (substr($line, 0, 1) == "$") {
        // Extraction de la température et de l'humidité
        $data = explode(";", substr($line, 1, -2));
        $temperature = $data[0];
        $humidite = $data[1];
        // Insertion des données dans la base de données
        $query = "INSERT INTO data (temperature, humidité, date, heure) VALUES ('$temperature', '$humidite', '$date', '$heure')";
        if (!mysqli_query($connection, $query)) {
            echo "Erreur: " . mysqli_error($connection);
        }
    }
    // Vérification si la ligne se termine par un dièse
    else if (substr($line, -2, 1) == "#") {
        break; // Sortie de la boucle de lecture du fichier
    }
}

fclose($file);
file_put_contents("data.txt", "");

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>