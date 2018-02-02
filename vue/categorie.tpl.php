<div class="wrapper">
	<section id="mainsection"  class="grid">

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
