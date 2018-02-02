<section id="projecttop"><!--Section Project Top-->

    <img src="vue/img/<?=$main_image_projet['url_img']; ?>" alt="<?=$main_image_projet['alt_img']; ?>" class="mobile-hide"><!--
  --><article class="project-description"> <!--Preview-->
      <h2 id="titreprojet" style="color: #<?=isset($info_projet) ? $info_projet['couleur_titre'] : '';?>;"><?=isset($info_projet) ? $info_projet['nom_projet'] : ''; ?></h2>
      <h6 id="poste"><?=isset($info_projet) ? $info_projet['poste'] : ''; ?></h6>
      <pre id="texteprojet" class="mobile-hide"><?=isset($info_projet) ? $info_projet['texte'] : ''; ?></pre>
  </article> <!--Preview-->

</section><!--Section Project Top-->


<div id="separation" class="mobile-hide"><!--Separation-->
	<div class="line-separator"></div>
	<a href="#mainsection">La suite <i class="fa fa-caret-down" aria-hidden="true"></i></a>
	<div class="line-separator"></div>
</div><!--Separation-->


<div class="wrapper"> <!--Main Section-->
	<section id="mainsection"  class="grid">

    <!-- TODO Développer une solution pour intégrer les vidéos nativement -->
		<?php if ($ref_projet == 31) :?>
			<div class="colvid">
				<div class="aspect-ratio">
					<iframe src="https://www.youtube.com/embed/W94DL9pMe5Q" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		<?php endif; ?>

		<?php foreach ($images_projet as $image): ?>

			<div class="col-<?=$image['largeur_img'] ?>" style="background-image: url('vue/img/<?=$image['url_img']; ?>')" data-img-pos="<?=$image["pos_img"]; ?>" data-idimage="<?=$image["idimage"]; ?>">
				<a href="vue/img/<?=$image['url_img']; ?>" data-fancybox="group" class="colcontent" title="<?=$image['alt_img'];?>"></a>
			</div>

		<?php endforeach ?>
		<div class="clearfix"></div>
	</section>
</div> <!--Main Section-->
