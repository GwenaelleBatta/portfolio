<?php get_header(); ?>
	<main>
		<section aria-labelledby="project" class="layout__project projects">
			<h2 id="project"  class="projects__title"><?= __('Liste de mes projets', 'portfolio') ?></h2>
			<?php if (($projets = portfolio_get_projets())->have_posts()):while ($projets->have_posts()): $projets->the_post(); ?>
				<article aria-labelledby="article" class="projects__article">
					<div class="projects__cards">
						<header class="projects__head">
							<h3 id="article" class="projects__title"><?= get_the_title() ?></h3>
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