<?php

require_once "model/conf.php";


//1- Connexion base projets
require_once "model/connexion_bdd.php";


//2- Récupérer 3 derniers projets
$query_projets = $bdd->prepare('SELECT projets.id_projet AS id_projet, projets.nom_projet AS nom_projet, images.url_img AS url_img
                                FROM projets
                                INNER JOIN images
                                ON projets.id_projet = images.idprojet
                                WHERE images.pos_img = 1
                                ORDER BY projets.date_projet DESC
                                LIMIT 0, 3');
$query_projets->execute();
$derniers_projets = $query_projets->fetchAll();
$query_projets->closeCursor();

//3- Variable titre
$page_title = "Scénographe";

//4- Lancer le rendu des templates
include_once "vue/header.tpl.php";
include_once "vue/home.tpl.php";
include_once "vue/footer.tpl.php";


/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 29/04/2017
 * Time: 17:11
 */
