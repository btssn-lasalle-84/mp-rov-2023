<?php
include 'utilisateur.php';
$port = "/dev/ttyUSB0"; 
$speed = 9600; 

// Ouverture du port série
$fp = fopen($port, "r+");
if (!$fp) {
    die("Impossible d'ouvrir la connexion série");
}

// Ouvrir le fichier de sortie
$outputFile = "data.txt";
$fileHandle = fopen($outputFile, 'a');

// Lecture des trames en boucle et écrire dans le fichier de sortie
while (true) {
    // Lecture une ligne depuis la connexion série
    $line = fgets($fp);

    // Écriture de la ligne dans le fichier de sortie
    fwrite($fileHandle, $line);

    // Afficher la ligne pour déboguer si nécessaire
    echo $line;
}

// Fermer les fichiers et la connexion série
fclose($fileHandle);
fclose($fp);


?>


