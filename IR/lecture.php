<?php
    include 'utilisateur.php';
    $cheminPortSérie = "/dev/ttyUSB0"; 

    // Ouverture du port série
    $ouverturePortSérie = fopen($cheminPortSérie, "r+");
    if (!$ouverturePortSérie) 
    {
        die("Impossible d'ouvrir la connexion série");
    }

    // Ouvrir le fichier de sortie

    $fichierTexteTampon = fopen("fichier_texte_tampon.txt", "a");

    // Lecture des trames en boucle et écrire dans le fichier de sortie
    while (true) 
    {
        // Lecture une ligne depuis la connexion série
        $lectureTrameDansBuffer = fgets($ouverturePortSérie);

        // Écriture de la ligne dans le fichier de sortie
        fwrite($fichierTexteTampon, $lectureTrameDansBuffer);

        // Afficher la ligne pour déboguer si nécessaire
        echo $lectureTrameDansBuffer;
    }

    // Fermer les fichiers et la connexion série
    fclose($fichierTexteTampon);
    fclose($ouverturePortSérie);


?>


