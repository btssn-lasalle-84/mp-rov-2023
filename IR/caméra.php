<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>IHM</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<header>
    <h1>Rendu de la caméra</h1>
    <div id="logo">
        <a href="utilisateur.php"><img src="images/logo.png" alt="logo" ></a>
  </div>

</header>

<div class="conteneurAuCentre">
    <form method="POST" action="stockage.php">
            <div id="camera" style="display: flex; margin-left: auto; margin-right: auto;"></div>
                <input
                    type="button"
                    value="Prendre une capture d'écran"
                    onClick="take_snapshot()"
                />
                <input type="hidden" name="image" class="image-tag" /> 
            <div class="conteneurAuCentre">
                
                <button>Envoyer la capture d'écran</button>
            </div>
    </form>
</div>

<!-- Bloc de la caméra-->
<div class="camera" >
    <script language="JavaScript">
        Webcam.set({
            width: 1200,
            height: 700,
            dest_width: 640,
            dest_height: 480,
            image_format: "jpeg",
            jpeg_quality: 90,
        });

    Webcam.attach("#camera");
                    
    function take_snapshot() {
        Webcam.snap(function (data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById("affichageCapture").innerHTML =
            '<img src="' + data_uri + '"/>';
        });
        }
    </script>
</div>
</head>

<body>
	<h1>Galerie de photos</h1>

    <div id="affichageCapture">
        Votre capture apparaitra içi
    </div>
               
	<div class="conteneurAuCentre">
		<?php
			// Répertoire où se trouvent les photos
		    $repertoireImages = 'uploads/';

			// Liste des extensions de fichiers à afficher
			$extensionsPhotos = array('jpg', 'jpeg', 'png', 'gif');

			// Ouvre le répertoire
			if ($ouvertureRepertoireImage = opendir($repertoireImages)) {
				// Parcours les fichiers
				while (false !== ($recuperationNomImage = readdir($ouvertureRepertoireImage))) {
					// Récupère l'extension du fichier
					$extension = pathinfo($recuperationNomImage, PATHINFO_EXTENSION);

					// Vérifie si l'extension est dans la liste des extensions à afficher
					if (in_array($extension, $extensionsPhotos)) {
						// Affiche l'image
						echo '<img src="'.$repertoireImages.'/'.$recuperationNomImage.'" alt="'.$recuperationNomImage.'">';
					}
				}
				// Ferme le répertoire
				closedir($ouvertureRepertoireImage);
			}
		?>
	</div>  

</body>
</html>