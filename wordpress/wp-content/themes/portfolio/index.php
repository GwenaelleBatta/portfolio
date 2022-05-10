<?php get_header(); ?>
<main class="layout">
	<section aria-labelledby="intro" class="layout__intro intro">
		<h2 id="intro" class="intro__title"><?= __('Gwenaëlle Batta, web designer', 'portfolio'); ?></h2>
		<figure class="intro__figure">
			<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'intro__thumb']); ?>
		</figure>
		<div class="intro__container">
			<a href="#" class="intro__link"><?= __('En savoir plus', 'portfolio') ?></a>
			<a href="#" class="intro__link"><?= __('Me contacter', 'portfolio') ?></a>
		</div>
	</section>
	<section aria-labelledby="projects" class="layout__project projects">
		<h2 id="projects" class="projects__title"><?= __('Mes derniers projets', 'portfolio') ?></h2>
		<a href="#" class="project__link"><?= __('Voir tous les projets', 'portfolio') ?></a>
		<?php if (($projets = portfolio_get_projets(3))->have_posts()):while ($projets->have_posts()): $projets->the_post(); ?>
			<article aria-labelledby="lastest" class="project">
				<div class="project__cards">
					<h3 id="lastest" class="project__title"><?= get_the_title() ?></h3>
					<div class="project__excerpt">
						<p class="project__paragraph"><?= get_the_content() ?></p>
					</div>
					<a href="<?= get_the_permalink() ?>"
					   class="project__link"><?= __('Voir le projet', 'portfolio') ?></a>
				</div>
				<div class="project__picture">
					<figure class="project__fig">
						<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'project__thumb']); ?>
					</figure>
				</div>
			</article>
		<?php endwhile; ?>
		<?php else: ?>
			<p class="project__empty">Il n'y a pas de nouveaux projets</p>
		<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
