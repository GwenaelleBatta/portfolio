<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__singleProjet">
		<section aria-labelledby="singleProjet" class="singleProjet__section">
			<h2 id="singleProjet" class="singleProjet__title" aria-level="2"><?= get_the_title() ?></h2>
			<a href="<?= get_post_type_archive_link('projet') ?>"
			   class="singleProjet__return"><?= __('Retour aux projets', 'portfolio') ?></a>
			<div class="singleProject__excerpt">
				<p class="singleProject__description">
					<?= get_field('excerpt') ?>
				</p>
			</div>
		</section>
		<section aria-labelledby="description" class="singleProject__description">
			<h2 id="description" class="singleProject__title" aria-level="2"><?= __('Description', 'portfolio') ?></h2>
			<p class="singleProject__description"><?= get_the_content() ?></p>
		</section>
		<figure class="singleProjet__fig">
			<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'singleProjet__thumb']); ?>
		</figure>
		<div class="singleProjet__nav">
			<?php if( get_adjacent_post(false, '', false) ) {
				next_post_link('%link', ' %title');
			} else {
				$last = new WP_Query('post_type=projet&posts_per_page=1&order=ASC'); $last->the_post();
				echo '<a href="' . get_permalink() . '">' . get_the_title() .'</a>';
				wp_reset_query();
			};  ?>
			<a href="<?= get_field('lien') ?>"
			   class="singleProjet__link"><?= __('Aller vers le site', 'portfolio') ?></a>
			<?php if( get_adjacent_post(false, '', true) ) {
				previous_post_link('%link', '%title ');
			} else {
				$first = new WP_Query('post_type=projet&posts_per_page=1&order=DESC'); $first->the_post();
				echo '<a href="' . get_permalink() . '">' . get_the_title() .'</a>';
				wp_reset_query();
			}; ?>
		</div>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>