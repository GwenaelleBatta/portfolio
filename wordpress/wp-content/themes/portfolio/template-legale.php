<?php /* Template Name: Legale page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout__legales">
        <section aria-labelledby="legales" class="legales">
            <h2 id="legales" class="legales__title" aria-level="2"><?= get_the_title(); ?></h2>
        </section>
		<section aria-labelledby="coordinates" class="legales__section">
			<h2 id="coordinates" class="coordinate__title" aria-level="2"><?= __('Coordonnées', 'portfolio') ?></h2>
			<section aria-labelledby="coordinate" class="coordinates">
				<h3 id="coordinate" class="coordinates__title hidden" aria-level="3"><?=__('Mes coordonnées')?></h3>
				<section aria-labelledby="mail" class="coordinates__mail">
					<h4 id="mail" class="coordinates__title" aria-level="4"><?= __('Mail', 'portfolio') ?></h4>
					<p class="coordinates__mail mail">
						<a href="mailto:gwenaellebatta@gmail.com">gwenaellebatta@gmail.com</a>
					</p>
				</section>
				<section aria-labelledby="phone" class="coordinates__phone">
					<h4 id="phone" class="coordinates__title" aria-level="4"><?= __('Téléphone', 'portfolio') ?></h4>
					<p class="coordinates__mail phone">
						+42 (0)491 30 53 40
					</p>
				</section>
				<section aria-labelledby="address" class="coordinates__address" itemscope itemtype="https://schema.org/PostalAddress">
					<h4 id="address" class="coordinates__title" aria-level="4"><?= __('Adresse', 'portfolio') ?></h4>
					<p itemprop="streetAddress" class="coordinates__adress">
						Rue Charles Rittwéger, 186
					</p>
					<p itemprop="postalCode" class="coordinates__postal">
						4910 THEUX
					</p>
				</section>
			</section>
		</section>

		<section class="confident">
			<h2 class="confident__title"><?=__('Clauses de confidentialité', 'portfolio')?></h2>
			<p class="confident__text">
				<?= get_the_content()?>
			</p>
		</section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>