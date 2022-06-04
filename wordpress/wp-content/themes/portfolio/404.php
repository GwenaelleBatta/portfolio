<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>
<main class="error404">
    <section aria-labelledby="error404" class="error404__container">
        <div class="error404__position">
            <h2 class="error404__title" id="error404" aria-level="2">404</h2>
            <p class="error404__subtitle"><?= __('Page non trouvée', 'ecosphair') ?></p>
        </div>
        <p class="error404__content"><?= str_replace(':accueil', '<a href="' . home_url() . '" class="error404__link">' . __('l’accueil', 'ecosphair') . '</a>', __('Retourner à :accueil', 'ecosphair')) ?></p>
    </section>
</main>
<?php get_footer(); ?>