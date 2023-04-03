<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/png" href="logo.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<body>

<header>
    <h1>Interface utilisateur </h1>
  <div id="logo">
    <a href="utilisateur.php"><img src="logo.png" alt="logo" ></a>
  </div>
</header>

<div id="wrap">
      <ul class="navbar">
        <li>
        <a href="">| | |</a>
        <ul>
        <li><a href="caméra.php">Flux Vidéo en Direct</a></li>
        <li><a href="#">Photos</a></li>
        </ul>
        </li>
    </ul>
</div>   
            <?php

              // Protocole de connexion à la base de donnée  

              $con = new mysqli("localhost","ROVEU","", "ROV");
              $con->set_charset("utf8");
              $requete = "SELECT* FROM data";
           ?>

            <!-- Tableau d'affichage BDD-->

           <table style="border:1px solid black;">
                <tr>
                    <th>ID</th>
                    <th>Temperature</th>
                    <th>Humidité</th>
                </tr>
             
           <?php
              $row = mysqli_num_rows($requete);
              $resultat = $con->query($requete);
              while ($ligne = $resultat->fetch_assoc())
              {
               echo "<tr> <td style=\"border:1px solid black;\">". $ligne['id'] .  " </td> <td style=\"border:1px solid black;\">" . $ligne['temperature'] . " </td> <td style=\"border:1px solid black;\">" . $ligne['humidité'] . ' </td> </tr>';
           }
           
            ?>  
 
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

</body>
</html>