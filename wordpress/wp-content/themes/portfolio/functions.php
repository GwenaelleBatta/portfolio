<?php

require_once(__DIR__ . '/acf.php');
require_once(__DIR__ . '/Menus/PrimaryMenuWalker.php');
require_once(__DIR__ . '/Menus/PrimaryMenuItem.php');
require_once(__DIR__ . '/Forms/BaseFormController.php');
require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');
require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');
require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');
require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');
require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');

// Lancer la sessions PHP pour pouvoir passer des variables de page en page
add_action('init', 'portfolio_boot_theme', 1);

function portfolio_boot_theme()
{
    //load_theme_textdomain( 'portfolio', __DIR__ . '/locales');
    if (!session_id()) {
        session_start();
    }
}

//Désactiver l'éditeur Gutenberg de Wordpress
add_filter('use_block_editor_for_post', '__return_false');
//Activer les images sur les articles
add_theme_support('post-thumbnails');
//Enregistrer un seul custom post-type pour nos voyages
register_post_type('projet',[
    'label'=>'Portfolios',
    'labels'=>[
        'name'=>'Portfolios',
        'singular_name'=>'Portfolio'
    ],
    'description'=>'Portfolio pour présenter mes projets réaliser dans le cadre de mes études',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-portfolio',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'projet',
    ],
]);
register_post_type('school',[
    'label'=>'Schools',
    'labels'=>[
        'name'=>'Schools',
        'singular_name'=>'School'
    ],
    'description'=>'Présentation des différentes écoles que j\'ai fréquentées',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-welcome-learn-more',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'school',
    ],
]);
register_post_type('network',[
    'label'=>'Networks',
    'labels'=>[
        'name'=>'Networks',
        'singular_name'=>'Network'
    ],
    'description'=>'Liste des réseaux sociaux',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-share',
    'public' =>true,
    'has_archive'=>true,
    'show_ui' => true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'network',
    ],
]);
register_post_type('message', [
    'label' => 'Messages de contact',
    'labels' => [
        'name' => 'Messages de contact',
        'singular_name' => 'Message de contact',
    ],
    'description' => 'Les messages envoyés par le formulaire de contact.',
    'public' => false,
    'show_ui' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-buddicons-pm',
    'capabilities' => [
        'create_posts' => false,
        'read_post' => true,
        'read_private_posts' => true,
        'edit_posts' => true,
    ],
    'map_meta_cap' => true,
]);
function portfolio_get_projets($count = 20){
    //1. on instancie l'objet WP_Query
    $projets = new WP_Query([
        //arguments
        'post_type' => 'projet',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $projets;
}
function portfolio_get_networks(){
    //1. on instancie l'objet WP_Query
    $networks = new WP_Query([
        //arguments
        'post_type' => 'network',
        'orderby' =>'date',
        'order'=>'ASC',
    ]);
    //2. on retourne l'objet WP_Query
    return $networks;
}
function portfolio_get_school($count = 20){
    //1. on instancie l'objet WP_Query
    $schools = new WP_Query([
        //arguments
        'post_type' => 'school',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $schools;
}
function portfolio_get_template_page(string $template){
    $query = new WP_Query([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template . '.php',
            ],
        ]
    ]);
    return $query->posts[0] ?? null;
}
register_nav_menu('primary', 'Navigation principale (haut de page)');
register_nav_menu('footer', 'Navigation de pied de page');
function portfolio_get_menu_items($location)
{
    $items = [];

    // Récupérer le menu Wordpress pour $location
    $locations = get_nav_menu_locations();

    if (!($locations[$location] ?? false)) {
        return $items;
    }

    $menu = $locations[$location];

    // Récupérer tous les éléments du menu récupéré
    $posts = wp_get_nav_menu_items($menu);

    // Formater chaque élément dans une instance de classe personnalisée
    // Boucler sur chaque $post
    foreach ($posts as $post) {
        // Transformer le WP_Post en une instance de notre classe personnalisée
        $item = new PrimaryMenuItem($post);

        // Ajouter au tableau d'éléments de niveau 0.
        if (!$item->isSubItem()) {
            $items[] = $item;
            continue;
        }

        // Ajouter $item comme "enfant" de l'item parent.
        foreach ($items as $parent) {
            if (!$parent->isParentFor($item)) continue;

            $parent->addSubItem($item);
        }
    }

    // Retourner un tableau d'éléments du menu formatés
    return $items;
}
add_action('admin_post_submit_contact_form', 'portfolio_handle_submit_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'portfolio_handle_submit_contact_form');

function portfolio_handle_submit_contact_form() {
    // Instancier le controlleur du formulaire
    $form = new ContactFormController($_POST);
}

function portfolio_get_contact_field_value($field)
{
    if (!isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    return $_SESSION['contact_form_feedback']['data'][$field] ?? '';
}

function portfolio_get_contact_field_error($field)
{

    if (!isset($_SESSION['contact_form_feedback'])) {
        return '';
    }

    if (!($_SESSION['contact_form_feedback']['errors'][$field] ?? null)) {
        return '';
    }

    return '<p  class="form__error">Ce champ ne respecte pas : ' . $_SESSION['contact_form_feedback']['errors'][$field] . '</p>';
}
function portfolio_mix($path)
{

    //$path = 'js/script.js'
    $path = '/' . ltrim($path, "/");
    if (!realpath(__DIR__ . '/public' . $path)) {
        return '';
    }

    if (!($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
        return get_stylesheet_directory_uri() . '/public' . $path;

    }
    //Ouvrir le fichier mix-manifest.json
    $manifest = json_decode(file_get_contents($manifest), true);

    //Regarder si on a une clé qui correspond au fichier chargé dans $path
    if (!array_key_exists($path, $manifest)) {
        return get_stylesheet_directory_uri() . '/public' . $path;

    }

    //Recupérer le hash
    //Retourner la chemin versionné

    return get_stylesheet_directory_uri() . '/public' . $manifest[$path];


}