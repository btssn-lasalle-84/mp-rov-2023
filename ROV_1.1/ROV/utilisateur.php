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
            video{
                display: flex; 
                justify-content: space-around;   
            }
            h1{
                text-align:center; 
            }
            .container{
                text-align:center; 
            }       
            
        </style>

        <div class="container">

            <form method="POST" action="http://localhost/ROV/stockage.php">

        <div class="col-md-6">
                <div id="my_camera"></div>
                <br />
                <input
                    type="button"
                    value="Prendre une capture d'écran"
                    onClick="take_snapshot()"
                />
                <input type="hidden" name="image" class="image-tag" />
                </div>
                <div class="col-md-6">
                <div id="results">Votre capture apparaitra içi</div>
                </div>
                <div class="col-md-12 text-center">
                <br />
                <button class="btn btn-success">Envoyer la capture d'écran</button>
                </div>
                </div>
            </form>
        </div>

            <!-- Bloc de la caméra-->
            
            <script language="JavaScript">
                    Webcam.set({
                        width: 490,
                        height: 390,
                        image_format: "jpeg",
                        jpeg_quality: 90,
                    });

                    
                
                    Webcam.attach("#my_camera");
                
                    function take_snapshot() {
                        Webcam.snap(function (data_uri) {
                        $(".image-tag").val(data_uri);
                        document.getElementById("results").innerHTML =
                            '<img src="' + data_uri + '"/>';
                        });
                    }
            </script>


<form name="file" action="filedb.php" method="post" enctype="multipart/form-data">
   <input type="file" name="file" value="" />
   <input type="submit" name="Upload" value="Upload">
</form> 
            
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

            

           
           




</body>
</html>