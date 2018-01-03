<?php

require_once "model/conf.php";


//1- Tester la variable reçu en GET
if (isset($_GET['ref'])){
    $ref_cat = filter_input(INPUT_GET, 'ref');
}
else {
    header('Location: index.php');
}

//2- Connexion à la base projets
include_once "model/connexion_bdd.php";

//3- Vérifier que la catégorie demandée existe dans la BDD
// Récupération des id de catégogires en base
$query_categories = $bdd->prepare('SELECT categories.id_cat
                                  FROM categories
                                  ORDER BY categories.id_cat ASC;');
$query_categories->execute(array());
$categories_id = $query_categories->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_COLUMN, 0);
$query_categories->closeCursor();
// Validation de l'id reçu en get
if (in_array($ref_cat, $categories_id)) {
  $category_exists = true;
}
else {
  $category_exists = false;
}

//4- Sortir les projets de la catégorie choisie
if ($category_exists) {
    $query_projets = $bdd->prepare('SELECT projets.id_projet AS id_projet, projets.nom_projet AS nom_projet, images.url_img AS url_img, categories.nom_cat AS nom_cat
                                    FROM projets
                                    INNER JOIN images
                                    ON projets.id_projet = images.idprojet
                                    INNER JOIN categories
                                    ON categories.id_cat = projets.id_cat
                                    WHERE images.pos_img = 1 AND projets.id_cat = ?
                                    ORDER BY projets.date_projet DESC;');
    $query_projets->execute(array($ref_cat));
    $projets_cat = $query_projets->fetchAll();
    $query_projets->closeCursor();

    //Variable titre
    $page_title = $projets_cat[0]['nom_cat'];
}
// Default to the "ALL" display
else {
    $query_projets = $bdd->prepare('SELECT projets.id_projet AS id_projet, projets.nom_projet AS nom_projet, images.url_img AS url_img
                                    FROM projets
                                    INNER JOIN images
                                    ON projets.id_projet = images.idprojet
                                    WHERE images.pos_img = 1
                                    ORDER BY projets.date_projet DESC;');
    $query_projets->execute(array());
    $projets_cat = $query_projets->fetchAll();
    $query_projets->closeCursor();

    //Variable titre
    $page_title = "Tous les projets";
}

//5- Lancer le rendu des templates
include_once "vue/header.tpl.php";
include_once "vue/categorie.tpl.php";
include_once "vue/footer.tpl.php";

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 29/04/2017
 * Time: 17:20
 */
