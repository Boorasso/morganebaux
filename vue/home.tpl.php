<div class="wrapper appear">
	<section id="topsection" class="grid">
		<a href="categorie.php?ref=all"  class="col" style="background-image: url('vue/img/morgane-caprices-carre.jpg')">
			<div class="colcontent"><p>Tous les projets</p></div>
		</a>
		<a href="actualite.php"  class="col" style="background-image:url('vue/img/treteaux couleurs-carre.jpg')">
			<div class="colcontent"><p>Actualité</p></div>
		</a>
		<a href="contact.php"  class="col" style="background-image:url('vue/img/photo intro theatre carre.jpg')">
			<div class="colcontent"><p>Contact CV</p></div>
		</a>
		<div class="clearfix"></div>
	</section>
</div>
<div class="clearfix"></div>
<div id="separation">
	<div class="line-separator"></div>
	<a href="#">Dernièrement <i class="fa fa-caret-down" aria-hidden="true"></i></a>
	<div class="line-separator"></div>
</div>
<div class="clearfix"></div>
<div class="wrapper appear">
	<section id="mainsection"  class="grid">

		<?php foreach ($derniers_projets as $projet): ?>

			<a href="projet.php?ref=<?=$projet['id_projet']; ?>"  class="col" style="background-image: url('vue/img/<?=$projet['url_img']; ?>')">
				<div class="colcontent"><p><?=$projet['nom_projet']; ?></p></div>
			</a>

		<?php endforeach ?>

		<div class="clearfix"></div>
	</section>
</div>
