<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/png" href="images/logo.png" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script> <!-- Triangle Backgound-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
    <script src="ajax.js"></script>
    <script src="animation.js"></script>

    <body>

<header>
    <h1>Interface utilisateur </h1>
  <div id="logo">
    <a href="utilisateur.php"><img src="images/logo.png" alt="logo" ></a>
  </div>
</header>

      <ul class="barre_navigation">
        <li>
          <a href="">| | |</a>
          <ul>
            <li>
              <a href="caméra.php">Flux Vidéo en Direct</a>
            </li>
          </ul>
        </li>
    </ul>
   
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
<div class="conteneurAuCentre">
  <div id="bouton_liaison">
    <button  class = "button1"onclick="openInNewTab('http://localhost/ROV/lecture.php')">Lancer lecture port</button>
  </div>
</div>
    

 <!-- Récuperation méthode getDate -->
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