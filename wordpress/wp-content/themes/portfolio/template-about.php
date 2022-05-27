<?php /* Template Name: About page template */; ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__about">
		<section aria-labelledby="About" class="about">
			<h2 id="About" class="about__title" aria-level="2"><?= get_the_title() ?></h2>
		</section>
		<div class="about__position">
			<section aria-labelledby="who" class="about__who who">
				<h2 id="who" class="who__title" aria-level="2"><?= __('Qui suis-je ?', 'portfolio') ?></h2>
				<p class="who__paragraph"><?= get_field('me'); ?></p>
			</section>
			<section class="about__career career">
				<h2 class="career__title" aria-level="2"><?= __('Mon parcours', 'portfolio') ?></h2>
				<p class="career__paragraph"><?= get_the_content(); ?></p>
				<ul class="career__list">
					<?php if (($school = portfolio_get_school())->have_posts()):while ($school->have_posts()): $school->the_post(); ?>
						<li class="career__item">
							<figure class="career__fig">
								<a href="<?= get_field('ecole') ?>"><?= get_the_post_thumbnail(null, 'medium', ['class' => 'career__thumb']); ?></a>
							</figure>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</section>
		</div>
		<div class="about__nav">
			<a href="https://projet-cv.gwenaelle-batta.be/" class="about__cv"><?= __('Voir mon CV', 'portfolio') ?></a>
			<a href="<?= get_the_permalink(portfolio_get_template_page('template-contact')) ?>"
			   class="about__contact"><?= __('Me contacter', 'portfolio') ?></a>
		</div>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>
