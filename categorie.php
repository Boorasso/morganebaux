<?php

//1- Tester la variable reçu en GET
//Tester la variable récupérée en GET !
if (isset($_GET['ref'])){
    $ref_projet = $_GET['ref'];
}
else {
    header('Location: index.php');
}

//2- Connexion à la base projets
include_once "model/connexion_bdd.php";

//3- Sortir les projets de la catégorie choisie
if ($ref_projet == "all") {
    $query_projets = $bdd->prepare('SELECT projets.id_projet AS id_projet, projets.nom_projet AS nom_projet, images.url_img AS url_img
                                FROM projets
                                INNER JOIN images
                                ON projets.id_projet = images.idprojet
                                WHERE images.pos_img = 1
                                ORDER BY projets.date_projet DESC;');
    $query_projets->execute(array());
    $projets_cat = $query_projets->fetchAll();
    $query_projets->closeCursor();
}
else {
    $query_projets = $bdd->prepare('SELECT projets.id_projet AS id_projet, projets.nom_projet AS nom_projet, images.url_img AS url_img
                                FROM projets
                                INNER JOIN images
                                ON projets.id_projet = images.idprojet
                                WHERE images.pos_img = 1 AND projets.id_cat = ?
                                ORDER BY projets.date_projet DESC;');
    $query_projets->execute(array($ref_projet));
    $projets_cat = $query_projets->fetchAll();
    $query_projets->closeCursor();
}

//4- Lancer le rendu des templates
include_once "vue/header.html";
include_once "vue/categorie.phtml";
include_once "vue/footer.html";

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 29/04/2017
 * Time: 17:20
 */