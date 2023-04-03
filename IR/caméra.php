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
<body>

<header>
    <h1>Rendu de la caméra</h1>
    <div id="logo">
    <a href="utilisateur.php"><img src="images/logo.png" alt="logo" ></a>
  </div>

</header>

<style>

            .container{
                text-align:center; 
            }     
            #logo{
        float: right;
        align:right; position: center; margin-top: -20px;
      }
</style>

<div class="container">

            <form method="POST" action="stockage.php">

            <div class="col-md-6">
                <div id="my_camera" style=" margin-left: auto; margin-right: auto;width: 6em;"></div>
                <br />
                <input
                    type="button"
                    value="Prendre une capture d'écran"
                    onClick="take_snapshot()"
                />
                <input type="hidden" name="image" class="image-tag" />
                </div>
                
                <div class="col-md-12 texœt-center">
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
</head>
<body>
	<h1>Galerie de photos</h1>

<div class="col-md-6">
                <div id="results">Votre capture apparaitra içi</div>
                </div>
              

	<div class="container">
		<?php
			// Répertoire où se trouvent les photos
			$dir = 'uploads/';

			// Liste des extensions de fichiers à afficher
			$extensions = array('jpg', 'jpeg', 'png', 'gif');

			// Ouvre le répertoire
			if ($handle = opendir($dir)) {
				// Parcours les fichiers
				while (false !== ($file = readdir($handle))) {
					// Récupère l'extension du fichier
					$extension = pathinfo($file, PATHINFO_EXTENSION);

					// Vérifie si l'extension est dans la liste des extensions à afficher
					if (in_array($extension, $extensions)) {
						// Affiche l'image
						echo '<img src="'.$dir.'/'.$file.'" alt="'.$file.'">';
					}
				}

				// Ferme le répertoire
				closedir($handle);
			}
		?>
	</div>  

</body>
</html>