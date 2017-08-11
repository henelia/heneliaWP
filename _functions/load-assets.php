<?php
/**
 * 
 * Nettoyage des éléments chargé dans les wp_head et wp_footer 
 * et ajout des elements spécifique au theme
 *
 * - Nettoyage
 * - Chargement assets
 *
 *
 */

function frontend_assets(){
    /*=================================
    =            Nettoyage            =
    =================================*/

    /*----------  Nettoyage des option de wordpress  ----------*/

    // remove_action('wp_head', 'wp_generator'); // Enlevé directement depuis le plugin Henelia
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'feed_links');
    remove_action('wp_head', 'feed_links_extra');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2 ); // remove dns-prefetch

    wp_deregister_script( 'wp-embed' ); // remove wp-embed - rajouter si besoin

    /*----------  Suppression des Emoji  ----------*/

    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'emoji_svg_url', '__return_false' );
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' ); // Suppression des Emoji dans Tiny MCE

    /*=====  End of Nettoyage  ======*/

    /*=========================================
    =            Chargement assets            =
    =========================================*/

    /*----------  Header  ----------*/

    wp_enqueue_style('main', get_template_directory_uri().'/style.css', false, 1, 'screen');
    wp_enqueue_style('print', get_template_directory_uri().'/css/print.css', false, 1, 'print');

    /*----------  Footer  ----------*/

    // Jquery
    /* Remplacement du jQuery Wordpress par le dernier à jour */
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), NULL, false);
    wp_enqueue_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), false, NULL, true);

    // Scripts projet
    wp_register_script('custom', get_template_directory_uri().'/scripts/scripts.min.js', array( 'jquery' ), '1.0.0', false);
    wp_enqueue_script('custom', get_template_directory_uri().'/scripts/scripts.min.js', array( 'jquery' ), '1.0.0', true);

    /*=====  End of Chargement assets  ======*/
}

add_action( 'wp_enqueue_scripts', 'frontend_assets');

?>