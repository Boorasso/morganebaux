<?php
/**
 * Created by PhpStorm.
 * User: iseabloom
 * Date: 12/08/2017
 * Time: 19:58
 */

require_once "conf.php";

$upload_dir = "/vue/img/";
$extensions_autorisees = array('jpg', 'jpeg', 'pdf', 'png');


if (isset($_FILES["image"]) AND $_FILES['image']['error'] == 0) {
    
    //Verification de la taille (max 5Mo)
    if ($_FILES['image']['size'] < MAX_FILE_SIZE) {

        $infosfichier = pathinfo($_FILES['image']['name']);
        $extension_upload = $infosfichier['extension'];

        // Testons si l'extension est autorisée
        if (in_array($extension_upload, $extensions_autorisees)) {

            // Enregistrement du fichier sur le serveur avec un timestamp pour éviter les noms en double
            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $infosfichier['basename']);
            $newName = $withoutExt.time().".".$extension_upload;
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'], "$appRootPath/$upload_dir/$newName");

            if ($resultat) {
                echo $newName;

                // Enregistrement en base de données
                
            }

        }
        else {
            echo "Ce format de fichier n'est pas autorisé";
        }
    }
    else {
        echo "La taille du fichier est trop importante";
    }
}