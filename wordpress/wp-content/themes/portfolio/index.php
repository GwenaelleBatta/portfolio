<?php get_header(); ?>
<main class="layout">
	<section aria-labelledby="intro" class="layout__intro intro">
		<h2 id="intro" class="intro__title" aria-level="2"><?=str_replace(':job','<br>' . __(' web designer', 'portfolio'), __('Gwenaëlle Batta:job,', 'portfolio'));?></h2>
		<div class="intro__container">
			<a href="<?=get_the_permalink(portfolio_get_template_page('template-about'))?>" class="intro__link"><?= __('En savoir plus', 'portfolio') ?></a>
			<a href="<?=get_the_permalink(portfolio_get_template_page('template-contact'))?>" class="intro__link"><?= __('Me contacter', 'portfolio') ?></a>
		</div>
	</section>
	<section aria-labelledby="projects" class="layout__project projects">
		<h2 id="projects" class="projects__title" aria-level="2"><?= __('Mes derniers projets', 'portfolio') ?></h2>
		<a href="<?=get_post_type_archive_link('projet');?>" class="project__link"><?= __('Voir tous les projets', 'portfolio') ?></a>
		<?php if (($projets = portfolio_get_projets(3))->have_posts()):while ($projets->have_posts()): $projets->the_post(); ?>
			<article aria-labelledby="article" class="projects__article">
				<div class="projects__cards">
					<header class="projects__head">
						<h3 id="article" class="projects__title" aria-level="3"><?= get_the_title() ?></h3>
					</header>
					<div class="projects__excerpt">
						<p class="projects__description">
							<?= get_field('excerpt') ?>
						</p>
					</div>
					<a href="<?= get_the_permalink() ?>"
					   class="projects__link"><?= __('Voir le projet', 'portfolio') ?></a>
				</div>
				<div class="projects__picture">
					<figure class="projects__fig">
						<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'projects__thumb']); ?>
					</figure>
				</div>
			</article>
		<?php endwhile; ?>
		<?php else: ?>
			<p class="projects__empty"><?= __('Il n\'y a pas de nouveaux projets', 'portfolio') ?></p>
		<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>
