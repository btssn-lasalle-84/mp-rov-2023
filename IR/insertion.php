<?php

    // Connexion à la base de données
    include 'utilisateur.php';
    include 'identifiant_bdd.php';
    $connexionBdd = mysqli_connect($identifiant, $nom_utilisateur, $mot_de_passe, $nom_bdd);

    // Vérification de la connexion
    if (mysqli_connect_errno()) 
    {
        die("Connexion échouée: " . mysqli_connect_error());
    }

    // Ouverture du fichier texte
     $fichierTexteTampon = fopen("fichier_texte_tampon.txt", "r+");

    // Lecture du fichier ligne par ligne
    while (!feof($fichierTexteTampon)) 
    {
        $lectureTrameDansBuffer = fgets($fichierTexteTampon);
        // Vérification si la ligne commence par un dollar
        if (substr($lectureTrameDansBuffer, 0, 1) == "$") 
        {
            // Extraction de la température et de l'humidité
            $extractionDonnéesSéparateur = explode(";", substr($lectureTrameDansBuffer, 1, -2));
            $temperature = $extractionDonnéesSéparateur[0];
            $humidite = $extractionDonnéesSéparateur[1];
            // Insertion des données dans la base de données
            $requeteInsertionBdd = "INSERT INTO data (temperature, humidité, date, heure) VALUES ('$temperature', '$humidite', '$date', '$heure')";
            if (!mysqli_query($connexionBdd, $requeteInsertionBdd)) 
            {
                echo "Erreur: " . mysqli_error($connexionBdd);
            }
        }
        // Vérification si la ligne se termine par un dièse
        else if (substr($lectureTrameDansBuffer, -2, 1) == "#") 
        {
            break; // Sortie de la boucle de lecture du fichier
        }
    }

    fclose($fichierTexteTampon);
    file_put_contents("fichier_texte_tampon.txt", "");

    // Fermeture de la connexion à la base de données
    mysqli_close($connexionBdd);
?>