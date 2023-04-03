            <?php
                
                $img = $_POST['image'];
                $folderPath = "uploads/";
            
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
            
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
            
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
            
                print_r($fileName);
            
            ?>


<?php

            // Connexion à la base de données
            $servername = "localhost";
            $username = "ROVEU";
            $password = "";
            $dbname = "ROV";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            // Échapper les caractères spéciaux pour éviter les injections SQL
            $file = mysqli_real_escape_string($conn, $file);

            // Préparer la requête d'insertion
            $sql = "INSERT INTO chemin (paths) VALUES ('$file')";
            
            // Exécuter la requête d'insertion
            if ($conn->query($sql) === TRUE) {
                echo "Chemin d'accès enregistré avec succès";
            } else {
                echo "Erreur lors de l'enregistrement du chemin d'accès: " . $conn->error;
            }
            // Fermer la connexion
            $conn->close();

            ?>

            