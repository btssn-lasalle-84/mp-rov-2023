<?php

// Ouverture du fichier de journalisation
$file = fopen("rov.log", "r+");

// Parcours du fichier ligne par ligne
while(!feof($file)) {
    $line = fgets($file);

    // Recherche des lignes commençant par un dollar
    if (substr($line, 0, 1) == "$") {
        // Extraction des informations entre les caractères de séparation
        $data = explode(";", substr($line, 1, -2));
        
        // Insersion des données dans la base de données
        $sql = "INSERT INTO data (temperature, humidité) VALUES ('$data[0]', '$data[1]')";
        
        if ($con->query($sql) === TRUE) {
            echo "Données insérées avec succès";
            
            // Suppression de la ligne du fichier de journalisation
            fseek($file, -strlen($line), SEEK_CUR);
            fwrite($file, str_repeat(" ", strlen($line)));
            fseek($file, -strlen($line), SEEK_CUR);
        } else {
            echo "Erreur lors de l'insertion des données: " . $con->error;
        }
    }
}

// Fermeture du fichier et de la connexion à la base de données
fclose($file);
$con->close();
?>
