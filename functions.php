<?php
/**
 *
 * Fonctions du Henelia WP Theme
 *
 * - Includes
 *
 */


/*================================
=            includes            =
================================*/

/*----------  php ----------*/

// Fonction personnalisé du theme
include "_functions/theme.php";		// Fonctions qui appel des templates d'affichages
include "_functions/load-assets.php";	// Fonctions permettant le chargement ciblé de scripts ou style

// Custom post type
// include "custom/custom-type_nomDuType.php";

// Custom taxonomy
// include "custom/custom-taxo_nomDeLaTaxo.php";



/*----------  ADMIN  ----------*/

include "_admin/admin.php";		// Fonctions de personnalisation de l'administration, en complement des options présente dans le plugins Henelia

add_action( 'admin_enqueue_scripts', 'he_wp_admin_inc' ); // Chargement des styles
add_action( 'login_enqueue_scripts', 'he_wp_admin_inc' );

	function he_wp_admin_inc() {

	    // scripts pour admin
	    wp_enqueue_script( 'he-wp-admin', get_template_directory_uri().'/_admin/he-wp-admin-scripts.js', false, false );

	    // css pour admin
	    wp_enqueue_style( 'he-wp-admin', get_template_directory_uri().'/_admin/he-wp-admin-style.css', false, false, 'screen' );

	    // media uploader
	    wp_enqueue_media();

	}

/*=====  End of includes  ======*/

?>