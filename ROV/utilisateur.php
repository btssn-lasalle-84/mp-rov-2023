<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css" type="text/css">
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
            video{
                display: flex; 
                justify-content: space-around;   
            }
        </style>

        
          <video width="640" height="480" autoplay></video>     
        
            <script>
            // Récupération de l'objet video
            const video = document.querySelector("video");

            // Vérification de la prise en charge de la webcam
            if (navigator.mediaDevices.getUserMedia) {
                // Demande d'autorisation pour accéder à la webcam
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                })
                .catch(function (err0r) {
                    console.log("Impossible d'accéder à la webcam : " + error.name, error.message);
                });
            }
            </script>


<?php

              $con = new mysqli("localhost","ROVEU","", "ROV");
              $con->set_charset("utf8");
              $requete = "SELECT* FROM données";
           
              ?>


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




                $serialPort = fopen("/dev/ttyACM0", "r");
                var_dump($serialPort);


                $data = fgets($serialPort);
                var_dump($data);

                
                echo $data;
                fclose($serialPort);


                $con ->exec ('INSERT INTO données(id, date, heure, temperature, humidité)
                VALUES (2,"", "" ,$data, "")');
                ?>

           

           
           




</body>
</html>