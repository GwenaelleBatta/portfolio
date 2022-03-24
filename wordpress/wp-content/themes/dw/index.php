<?php get_header();?>
<main class="layout">
    <section class="layout__latest latest">
        <h2 class="latest__title"><?= get_bloginfo('name');?></h2>
        <div class="letest__container">
			<p>Vous trouverez ici les différents projets que j'ai réalisé dans le cadre de mes étude en infographie option web</p>
        </div>
    </section>
	<section class="layout__project projects">
		<h2 class="projects__title">Mes dernières créations</h2>
		<?php if (($projets = dw_get_projets(2))->have_posts()):while ($projets->have_posts()): $projets->the_post();?>
			<article class="project">
				<a href="<?=get_the_permalink()?>" class="project__link">Voir plus sur <?= get_the_title()?></a>
				<div class="project__cards">
					<header class="project__head">
						<h3 class="project__title"><?= get_the_title()?></h3>
						<p class="project__date">Mis en ligne le <time class="trip__time" datetime="<?= date_i18n('c', strtotime(get_field('date_published',false,false)))?>"><?= ucwords(date_i18n('F, Y', strtotime(get_field('date_published',false,false))))?></p>
					</header>
					<figure class="project__fig">
						<?= get_the_post_thumbnail(null,'medium',['class'=>'trip__thumb']);?>
					</figure>
					<div class="project__excerpt">
						<p>
							<?= get_the_excerpt()?>
						</p>
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
