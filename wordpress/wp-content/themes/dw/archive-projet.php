<?php get_header();?>
<main>
	<section class="layout__project projects">
		<h2>Mes projets</h2>
		<?php if (($projets = dw_get_projets(10))->have_posts()):while ($projets->have_posts()): $projets->the_post();?>
			<article class="project">
				<a href="<?=get_the_permalink()?>" class="project__link">Voir plus sur <?= get_the_title()?></a>
				<div class="project__cards">
					<header class="project__head">
						<h3 class="project__title"><?= get_the_title()?></h3>
					</header>
					<figure class="project__fig">
						<?= get_the_post_thumbnail(null,'medium',['class'=>'trip__thumb']);?>
					</figure>
					<div class="project__excerpt">
						<p>
							<?= get_the_excerpt()?>
						</p>
						<p class="project__date">Mis en ligne le <time class="projet__time" datetime="<?= date_i18n('c', strtotime(get_field('date_published',false,false)))?>"><?= ucwords(date_i18n('F, Y', strtotime(get_field('date_published',false,false))))?></p>
					</div>
				</div>
			</article>
		<?php endwhile;?>
		<?php else:?>
			<p class="project__empty">Il n'y a pas de nouveaux projets</p>
		<?php endif;?>
	</section>

</main>
<?php get_footer();?>