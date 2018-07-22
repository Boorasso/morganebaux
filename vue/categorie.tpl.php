<div class="wrapper appear">
	<section id="mainsection"  class="grid">
		<?php if ($login && $category_exists) : ?>
			<a href="new_project.php"  class="col add-project">
				<div class="colcontent"><p>+</p></div>
			</a>
		<?php endif; ?>
		<?php foreach ($projets_cat as $projet): ?>
			<a href="projet.php?ref=<?=$projet['id_projet']; ?>"  class="col" style="background-image: url('vue/img/<?=$projet['url_img']; ?>')">
				<div class="colcontent">
					<p><?=$projet['nom_projet']; ?></p>
				</div>
			</a>
		<?php endforeach ?>
		<div class="clearfix"></div>
	</section>
</div>
