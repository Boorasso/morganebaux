<?php
//1- Récupérer ref projet en GET
//Tester la variable récupérée en GET !
if (isset($_GET['ref'])){
    $ref_projet = $_GET['ref'];
}
else {
    header('Location: index.php');
}

//2- Connexion base de données
$bdd = new PDO('mysql:host=localhost;dbname=morganebaux;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//3- Récupération données
$query_projet = $bdd->prepare('SELECT `nom_projet`, `poste`, `texte` 
                               FROM `projets`
                               WHERE `id_projet`= ?');
$query_projet->execute(array($ref_projet));
$info_projet = $query_projet->fetch();
$query_projet->closeCursor();

//4- Récupérer images projet
//Image principale :
$query_main_image = $bdd->prepare('SELECT `url_img`, `alt_img` 
                                   FROM `images` 
                                   WHERE `idprojet`= ? AND `pos_img` = 1');
$query_main_image->execute(array($ref_projet));
$main_image_projet = $query_main_image->fetch();
$query_main_image->closeCursor();
//Images projet :
$query_images = $bdd->prepare('SELECT `url_img` 
                               FROM `images` 
                               WHERE `idprojet`= ? AND `pos_img` > 1 
                               ORDER BY `pos_img`');
$query_images->execute(array($ref_projet));
$images_projet = $query_images->fetchAll();
$query_images->closeCursor();

//6- Lancement du rendu du template
include_once "vue/header.html";
include_once "vue/projet.phtml";
include_once "vue/footer.html";

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 29/04/2017
 * Time: 17:18
 */