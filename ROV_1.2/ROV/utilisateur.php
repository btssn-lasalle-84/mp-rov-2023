<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<body>

<header>
    <h1>Interface utilisateur </h1>



</header>

        <style>
            body {
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }
            h1{
                text-align:center; 
            }
            .container{
                text-align:center; 
            }       
            
            
            #wrap {
        width: 100%;
        height: 50px;
        margin: 0;
        z-index: 99;
        position: relative;
        
      }
      .navbar {
        height: 50px;
        padding: 0;
        margin: 0;
        position: absolute;
      }
      .navbar li {
        height: auto;
        width: 135.8px;
        float: left;
        text-align: center;
        list-style: none;
        font: normal bold 13px/1em Arial, Verdana, Helvetica;
        padding: 0;
        margin: 0;
        background-color: #444444;
      }
      .navbar a {
        padding: 18px 0;
        border-left: 1px solid #ccc9c9;
        text-decoration: none;
        color: white;
        display: block;
      }
      .navbar li:hover,
      a:hover {
        
      }
      .navbar li ul {
        display: none;
        height: auto;
        margin: 0;
        padding: 0;
      }
      .navbar li:hover ul {
        display: block;
      }
      .navbar li ul li {
        background-color: #444444;
      }
      .navbar li ul li a {
        border-left: 1px solid #444444;
        border-right: 1px solid #444444;
        border-top: 1px solid #c9d4d8;
        border-bottom: 1px solid #444444;
      }
        </style>


<div id="wrap">
      <ul class="navbar">
        <li>
        <a href="#">| | |</a>
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
              $requete = "SELECT* FROM données";
           ?>

            <!-- Tableau d'affichage BDD-->

           <table style="border:1px solid black;">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Temperature</th>
                    <th>Humidité</th>
                </tr>
             


           <?php
              $row = mysqli_num_rows($requete);
              $resultat = $con->query($requete);
              while ($ligne = $resultat->fetch_assoc())
              {
               echo "<tr> <td style=\"border:1px solid black;\">". $ligne['id'] . "</td> <td style=\"border:1px solid black;\">" . $ligne['date'] . "</td> <td style=\"border:1px solid black;\">" . $ligne['heure'] . " </td> <td style=\"border:1px solid black;\">" . $ligne['temperature'] . " </td> <td style=\"border:1px solid black;\">" . $ligne['humidité'] . ' </td> </tr>';
           }
           $con->close();
          ?>
            <?php
                        // Le chemin du dossier contenant les images
                        $image_dir = "uploads/";
                        
                        // Ouvrir le dossier
                        $dir_handle = opendir($image_dir);
                        
                        // Parcourir le dossier
                        while (($image = readdir($dir_handle)) !== false) {
                            // Vérifier que le fichier est une image
                            if (preg_match("/\.(png|jpg|jpeg|gif)$/", $image)) {
                                // Afficher l'image
                                echo "<img src='$image_dir/$image' alt='$image'>";
                            }
                        }
                        // Fermer le dossier
                        closedir($dir_handle);
            ?>



                <?php

                // Connexion port série

                $serialPort = fopen("/dev/ttyACM0", "r");
                var_dump($serialPort);

                $data = fgets($serialPort);
                var_dump($data);

            
                echo $data;
                fclose($serialPort);

                $con ->exec ('INSERT INTO données(id, date, heure, temperature, humidité)
                VALUES (2,"", "" ,$data, "")');

                ?>

                <?php

                // Afficher les photos présentes dans la base de donnée

                        $servername = "localhost";
                        $username = "ROVEU";
                        $password = "";
                        $dbname = "ROV";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("Connexion échouée: " . $conn->connect_error);
                        }
                        $zouz = "SELECT paths FROM chemin WHERE id=9";

                      
                            
                    
                    
                ?>  
                    







</body>
</html>