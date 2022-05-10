<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout singleProjet">
		<section aria-labelledby="singleProjet" class="singleProjet__section">
			<h2 id="singleProjet" class="singleProjet__title"><?= get_the_title() ?></h2>
			<a href="#" class="singleProjet__link"><?= __('Retour aux projets', 'portfolio') ?></a>
			<?php if ($icon = get_field('icon')): ?>
				<figure class="singleProjet__fig">
					<img src="<?= wp_get_attachment_image_src($icon, 'medium_large')[0] ?? null; ?>"
						 alt="icône du projet <?= get_the_title() ?>">
				</figure>
			<?php endif; ?>
			<div class="project__excerpt">
				<p class="project__description">
					<?= get_field('excerpt') ?>
				</p>
			</div>
		</section>
		<section aria-labelledby="description" class="project__description">
			<h2 id="description" class="project__title"><?=__('Description','portfolio')?></h2>
			<p class="project__description"><?= get_the_excerpt()?></p>
		</section>
		<figure class="singleProjet__fig">
			<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleProjet__thumb']); ?>
		</figure>
		<a href="#" class="singleProjet__link"><?=__('Projet précédent','portfolio')?></a>
		<a href="<?=get_field('lien')?>" class="singleProjet__link"><?=__('Aller vers le site','portfolio')?></a>
		<a href="#" class="singleProjet__link"><?=__('Projet suivant','portfolio')?></a>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>