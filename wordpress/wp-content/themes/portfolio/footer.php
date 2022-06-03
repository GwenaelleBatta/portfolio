<footer class="footer">
    <section aria-labelledby="footer" class="footer__body">
        <h2 id="footer" class="footer__title hidden" aria-level="2">Pied de la page de mon <?= get_bloginfo('name')?></h2>
        <p class="footer__placeholder"><?=__('Retrouvez moi aussi sur','portfolio')?></p>
		<ul class="footer__network">
		<?php if (($networks = portfolio_get_networks())->have_posts()):while ($networks->have_posts()): $networks->the_post(); ?>
			<li class="footer_item">
				<figure class="footer__fig">
					<a href="<?= get_field('network') ?>" class="project__link">
						<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'footer__thumb']); ?>
					</a>
				</figure>
			</li>
		<?php endwhile; ?>
		<?php endif; ?>
		</ul>
		<a href="<?=get_the_permalink(portfolio_get_template_page('template-legale'))?>" class="footer__link"><?= __('Mentions légales', 'portfolio') ?></a>
    </section>
</footer>
<script type="text/javascript" src="<?= portfolio_mix('/js/script.js'); ?>"></script>
</body>
</html>