<form action="save_project.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ref-projet" value="<?=$ref_projet;?>">
    <section id="projecttop"><!--Section Project Top-->
        
        <!--Image Admin Display-->
        <div class="img-admin-view" <?php if (isset($main_image_projet)) : ?>style="background-image: url('vue/img/<?=$main_image_projet['url_img']; endif; ?>'">
            <div class="admin-icons">
                <button onclick="$('#image_1').click()"> <i class="fa fa-file-image-o" aria-hidden="true"></i> </button>
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                <input type="file" name="image_1" id="image_1" class="image-input" style="display: none">
                <a href="#" class="tag_button"><i class="fa fa-tag" aria-hidden="true"></i></a>
            </div>
            <input type="text" id="alt_img" name="alt_img" class="image-alt-admin hidden" value="<?=isset($main_image_projet) ? $main_image_projet['alt_img'] : ''; ?>"/>
        </div><!--

	 --><article class="project-description-admin-view">

            <!-- Editing -->
            <!--Date du projet-->
            <label fot="date_projet" class="input-description">Date du projet</label>
            <p>(Sert pour l'ordre d'affichage des projets. Ne sera pas affiché pour les visiteurs.)</p>
            <input type="text" class="date-input input-description" value="<?=isset($info_projet) ? $info_projet["date_projet"] : ''; ?>" name="date_projet" id="date_projet">

            <!--Nom du projet et couleur-->
            <label for="nom_projet" class="input-description">Nom du projet</label>
            <input type="text" class="title-input input-description" value="<?=isset($info_projet) ? $info_projet['nom_projet'] : ''; ?>" name="nom_projet" id="nom_projet">
            <label for="couleur_titre" class="input-description">Couleur du titre</label>
            <p>(Code hex)</p>
            <input type="text" class="project-title-color-input input-description" value="<?=isset($info_projet) ? $info_projet['couleur_titre'] : ''; ?>" name="couleur_titre" id="couleur_titre">

            <!--Poste-->
            <label for="titre_poste" class="input-description">Poste</label>
            <input type="text" class="poste-input input-description" value="<?=isset($info_projet) ? $info_projet['poste'] : ''; ?>" name="titre_poste" id="titre_poste">

            <!--Texte et descriptif-->
            <label for="texte" class="input-description">Description du projet</label>
            <textarea name="texte" id="text"><?=isset($info_projet) ? $info_projet['texte'] : ''; ?></textarea>
            <script>CKEDITOR.replace( 'text' );</script>

        </article>

        <article class="project-description-preview hidden"> <!--Preview-->
            <h2 id="titreprojet" style="color: #<?=isset($info_projet) ? $info_projet['couleur_titre'] : '';?>;"><?=isset($info_projet) ? $info_projet['nom_projet'] : ''; ?></h2>
            <h6 id="poste"><?=isset($info_projet) ? $info_projet['poste'] : ''; ?></h6>
            <pre id="texteprojet" class="mobile-hide"><?=isset($info_projet) ? $info_projet['texte'] : ''; ?></pre>
        </article> <!--Preview-->

        <div class="button-center">
            <button class="edit-description black-button">Preview</button>
        </div>

    </section><!--Section Project Top-->


    <div id="separation" class="mobile-hide"><!--Separation-->
        <div class="line-separator"></div>
        <a href="#mainsection">La suite <i class="fa fa-caret-down" aria-hidden="true"></i></a>
        <div class="line-separator"></div>
    </div><!--Separation-->



    <div class="wrapper"> <!--Main Section-->
        <section id="mainsection"  class="grid">
            <?php if (isset($images_projet)) : foreach ($images_projet as $image): ?>
                <div class="col-<?=$image['largeur_img'] ?>" style="background-image: url('vue/img/<?=$image['url_img']; ?>')" data-img-pos="<?=$image["pos_img"]; ?>" data-img-count="<?=(count($images_projet)+1); ?>">
                    <a href="vue/img/<?=$image['url_img']; ?>" data-fancybox="group" class="colcontent"></a>
                        <div class="admin-icons">
                            <a href="#" class="select-size"><i class="fa fa-expand" aria-hidden="true"></i></a>
                            <select name="largeur_img_<?=$image["pos_img"]; ?>" id="largeur_img_<?=$image["pos_img"]; ?>" class="largeur-img hidden">
                                <option value="col-1" <?php if ("col-1" == "col-".$image['largeur_img']) {echo "selected";} ?>>Petit portrait 1/3</option>
                                <option value="col-2" <?php if ("col-2" == "col-".$image['largeur_img']) {echo "selected";} ?>>Petit paysage 2/3</option>
                                <option value="col-3" <?php if ("col-3" == "col-".$image['largeur_img']) {echo "selected";} ?>>Panorama 100%</option>
                                <option value="col-4" <?php if ("col-4" == "col-".$image['largeur_img']) {echo "selected";} ?>>Grand paysage 100%</option>
                                <option value="col-5" <?php if ("col-5" == "col-".$image['largeur_img']) {echo "selected";} ?>>Petit carré 50%</option>
                                <option value="col-6" <?php if ("col-6" == "col-".$image['largeur_img']) {echo "selected";} ?>>Grand carré 100%</option>
                                <option value="col-7" <?php if ("col-7" == "col-".$image['largeur_img']) {echo "selected";} ?>>Grand portrait 100%</option>
                            </select>
                            <a href="#" class="image-up <?php if ($image['pos_img'] == 2) {echo 'hidden';} ?>"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                            <a href="#" class="image-down <?php if ($image['pos_img'] == (count($images_projet)+1)) {echo 'hidden';} ?>"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                            <button class="change-image" onclick="$('#image_<?=$image["pos_img"]; ?>').click()"> <i class="fa fa-file-image-o" aria-hidden="true"></i> </button>
                            <input type="file" name="image_<?=$image["pos_img"]; ?>" id="image_<?=$image["pos_img"]; ?>" class="image-input" style="display: none">
                            <a href="#" class="delete-image"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                </div>
            <?php endforeach; endif; ?>
            <div class="add-image">
                <div class="colcontent" onclick="$('#image_new').click()"><p>+</p></div>
                <input type="file" name="image_new" id="image_new" style="display: none">
            </div>
            <div class="clearfix"></div>
        </section>
    </div> <!--Main Section-->

    <section class="row button-center">
        <div class="col-lg-4">
            <button class="hide-buttons black-button">Cacher les options</button>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="confirm-changes black-button">Enregistrer</button>
        </div>
        <div class="col-lg-4">
            <button class="delete-project black-button" data-project-id="">Supprimer ce projet</button>
        </div>
    </section>
</form>
