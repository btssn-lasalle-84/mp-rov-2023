<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="ajax.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500&family=Raleway:wght@100;200;300;400;500&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="animation.js"></script>
    <body>

<header>
    <h1>Interface utilisateur </h1>
  <div id="logo">
    <a href="utilisateur.php"><img src="images/logo.png" alt="logo" ></a>
  </div>
</header>

<div id="wrap">
      <ul class="navbar">
        <li>
        <a href="">| | |</a>
        <ul>
        <li><a href="caméra.php">Flux Vidéo en Direct</a></li>
        </ul>
        </li>
    </ul>
</div>   
            <?php
            include 'identifiant_bdd.php';
              // Protocole de connexion à la base de donnée  

              $con = new mysqli("$iden","$nom_utilisateur","$mot_de_passe", "$nom_bdd");
              $con->set_charset("utf8");
              $requete = "SELECT* FROM data";
           ?>

            <!-- Tableau d'affichage BDD-->
<div id="tableau" style="width: 100%; display: flex; justify-content: space-around;">
  <table style="border:1px solid black; width : 500px; height : 300px;">
    <thead>
        <tr>
          <th>ID</th>
          <th>Température</th>
          <th>Humidité</th>
          <th>Date</th>
          <th>Heure</th>
        </tr>
    </thead>

    <tbody>
    </tbody> 
  </table>         
</div>
<div class="container">
  <div id="bouton_liaison">
  <button  class = "button1"onclick="openInNewTab('http://localhost/ROV/lecture.php')">Lancer lecture port</button>
  </div>
</div>
    

<button onclick="sendData()">Envoyer le chiffre 8 sur le port série COM6</button>

<script>
function sendData() {
  const SerialPort = require('serialport');

const portName = '/dev/ttyUSB0'; // Nom du port série
const baudRate = 9600; // Vitesse de transmission

// Ouvre le port série
const port = new SerialPort(portName, { baudRate }, function(err) {
  if (err) {
    console.log('Erreur lors de l\'ouverture du port série : ', err.message);
  } else {
    console.log('Le port série est ouvert.');
    // Envoie la valeur ASCII de la touche "z" (122) sur le port série
    port.write(Buffer.from([122]), function(err) {
      if (err) {
        console.log('Erreur lors de l\'envoi des données : ', err.message);
      } else {
        console.log('Données envoyées avec succès.');
      }
      // Ferme le port série
      port.close();
    });
  }
});
</script>
<?php

$date["jour"] = $jour;
$date["mois"] = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet','aout'
,'septembre','octobre','novembre','décembre');
$hd = getdate();


$heure = "{$hd['hours']}:{$hd['minutes']}:{$hd['seconds']}";
$date = "{$hd['year']}-{$hd['mon']}-{$hd['mday']} ";

?>

<canvas class="background"></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>