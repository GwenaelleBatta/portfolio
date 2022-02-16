<?php
//Désactiver l'éditeur Gutenberg de Wordpress
add_filter('use_block_editor_for_post', '__return_false');
//Activer les images sur les articles
add_theme_support('post-thumbnails');
//Enregistrer un seul custom post-type pour nos voyages
register_post_type('trip',[
    'label'=>'Portefolios',
    'description'=>'Portefolio pour présenter mes projets réaliser dans le cadre de mes études',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-portfolio',
    'public' =>true,
    'labels'=>[
        'name'=>'Portefolios',
        'singular_name'=>'Portefolio'
    ]
]);