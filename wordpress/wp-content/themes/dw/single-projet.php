<?php get_header();?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main  class="layout singleProjet">
        <h2 class="singleProjet__title"><?= get_the_title()?></h2>
        <figure class="singleProjet__fig">
            <?= get_the_post_thumbnail(null,'medium_large',['class'=>'singleProjet__thumb']);?>
        </figure>
        <div class="singleProjet__content">
            <?php the_content();?>
        </div>
        <aside class="singleProjet__details">
            <h3 class="singleProjet__subtitle">Détails du projet</h3>
            <dl class="singleProjet__definitions">
                <dt class="singleProjet__label">Date de publication</dt>
                <dd class="singleProjet__data"><time class="singleProjet__time" datetime="<?= date_i18n('c', strtotime(get_field('date_published',false,false)))?>"><?= ucwords(date_i18n('d F Y', strtotime(get_field('date_published',false,false))))?></time></dd>
                <dt class="singleProjet__label">Date de création</dt>
                <dd class="singleProjet__data">
                    <?php if (get_field('created_date')):?>
                        <time class="singleProjet__time" datetime="<?= date_i18n('c', strtotime(get_field('created_date',false,false)))?>"><?= ucwords(date_i18n('d F Y', strtotime(get_field('created_date',false,false))))?></time>
                    <?php else:?>
                        <span class="singleProjet__empty">Aucune date de retour de prévue pour le moment.</span>
                    <?php endif;?>
                </dd>
            </dl>
        </aside>
    </main>
<?php endwhile;?>
<?php endif;?>
<?php get_footer()?>