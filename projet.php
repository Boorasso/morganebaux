<?php

require_once "model/conf.php";

//1- Récupérer ref projet en GET
//Tester la variable récupérée en GET !
if (isset($_GET['ref'])){
    $ref_projet = filter_input(INPUT_GET, 'ref');
}
else {
    header('Location: index.php');
}

//2- Connexion base de données
include_once "model/connexion_bdd.php";

//3- Récupération données
$query_projet = $bdd->prepare('SELECT `nom_projet`, `poste`, `texte`, `couleur_titre`, date_projet
                               FROM `projets`
                               WHERE `id_projet`= ?');
$query_projet->execute(array($ref_projet));
$info_projet = $query_projet->fetch();
$query_projet->closeCursor();

//4- Récupérer images projet
//Image principale :
$query_main_image = $bdd->prepare('SELECT `url_img`, `alt_img`, `idimage`
                                   FROM `images`
                                   WHERE `idprojet`= ? AND `pos_img` = 1');
$query_main_image->execute(array($ref_projet));
$main_image_projet = $query_main_image->fetch();
$query_main_image->closeCursor();

//Images projet :
$query_images = $bdd->prepare('SELECT `url_img`, images.largeur_img, images.pos_img, images.alt_img, images.idimage
                               FROM `images`
                               WHERE `idprojet`= ? AND `pos_img` > 1
                               ORDER BY `pos_img`');
$query_images->execute(array($ref_projet));
$images_projet = $query_images->fetchAll();
$query_images->closeCursor();

//5- Variable titre
$page_title = $info_projet['nom_projet'];
if ($login) {
    $page_title .= " - Admin";
}

//6- Lancement du rendu du template
include_once "vue/header.tpl.php";
include_once "vue/projet.tpl.php";
include_once "vue/footer.tpl.php";
