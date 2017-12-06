<?php
/**
 * Created by PhpStorm.
 * User: iseabloom
 * Date: 12/08/2017
 * Time: 15:19
 */

require_once "model/conf.php";

//1- Connexion base de données
include_once "model/connexion_bdd.php";

//2 - Créér un nouveau projet en base de donnée
$query_projet = $bdd->prepare('INSERT INTO projets (nom_projet, id_cat)
                               VALUES (\'new_project\', 1)');
$query_projet->execute(array());

//3 - Récupérer l'id du nouveau projet
$ref_projet = $bdd->lastInsertId();

//4 - Afficher la page d'édition
include_once "vue/header.tpl.php";
include_once "vue/admin_projet.tpl.php";
include_once "vue/footer.tpl.php";
