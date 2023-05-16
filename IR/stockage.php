            <?php
                $img = $_POST['image'];
                $repertoireImage = "uploads/";
            
                $traitementImage = explode(";base64,", $img);
                $extraireTypeFichier = explode("image/", $traitementImage[0]);
                $image_type = $extraireTypeFichier[1];
            
                $donnéeBase64EnBinaire = base64_decode($traitementImage[1]);
                $générationNomImage = uniqid() . '.png';
            
                $file = $repertoireImage . $générationNomImage;
                file_put_contents($file, $donnéeBase64EnBinaire);
            
                print_r($générationNomImage);

            ?>

<!-- Redirection vers la page caméra.php -->
<?php
  header('Location: http://localhost/ROV/caméra.php');
  exit();
?>