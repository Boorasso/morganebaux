<section id="projecttop"><!--Section Project Top-->

		<img src="vue/img/<?=$main_image_projet['url_img']; ?>" alt="<?=$main_image_projet['alt_img']; ?>" class="mobile-hide"><!--
	--><article>
			<h2 id="titreprojet" style="color: #<?=$info_projet['couleur_titre']; ?>;"><?=$info_projet['nom_projet']; ?></h2>
			<h6 id="poste"><?=$info_projet['poste']; ?></h6>
			<pre id="texteprojet" class="mobile-hide"><?=$info_projet['texte']; ?></pre>
		</article>

</section><!--Section Project Top-->


<div id="separation" class="mobile-hide"><!--Separation-->
	<div class="line-separator"></div>
	<a href="#mainsection">La suite <i class="fa fa-caret-down" aria-hidden="true"></i></a>
	<div class="line-separator"></div>
</div><!--Separation-->


<div class="wrapper"> <!--Main Section-->
	<section id="mainsection"  class="grid">
		<?php if ($ref_projet == 31) :?>
			<div class="colvid">
				<div class="aspect-ratio">
					<iframe src="https://www.youtube.com/embed/W94DL9pMe5Q" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		<?php endif; ?>
		<?php foreach ($images_projet as $image): ?>
			<div class="col-<?=$image['largeur_img'] ?>" style="background-image: url('vue/img/<?=$image['url_img']; ?>')" data-img-pos="<?=$image["pos_img"]; ?>" data-img-count="<?=(count($images_projet)+1); ?>">
				<a href="vue/img/<?=$image['url_img']; ?>" data-fancybox="group" class="colcontent"></a>
			</div>
		<?php endforeach ?>
		<div class="clearfix"></div>
	</section>
</div> <!--Main Section-->
