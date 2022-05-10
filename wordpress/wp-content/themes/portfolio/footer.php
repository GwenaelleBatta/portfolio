<?php

?>
<footer class="footer">
    <section aria-labelledby="footer" class="footer__body">
        <h2 id="footer" class="footer__title hidden">Pied de la page de mon <?= get_bloginfo('name')?></h2>
        <p class="footer__placeholder"><?=__('Retrouvez moi aussi sur','portfolio')?></p>
		<ul class="footer__network">
		<?php if (($networks = portfolio_get_networks())->have_posts()):while ($networks->have_posts()): $networks->the_post(); ?>
			<li class="footer_item">
				<figure class="footer__fig">
					<a href="<?= get_field('network') ?>" class="project__link">
						<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'project__thumb']); ?>
					</a>
				</figure>
			</li>
		<?php endwhile; ?>
		<?php endif; ?>
		</ul>
    </section>
</footer>
</body>
</html>
