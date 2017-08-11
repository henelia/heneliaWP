<?php

/**
 *
 * fonction spécifique au projet
 * Chargement des templates includes et fonction d'affichage en front
 *
 * - Body
 * - Menu
 * - Aside
 * - SVG
 *
 */

/*============================
=            Body            =
============================*/

// Affiche le slug de la page en cours en tant que class
// <body class="<!php display_body_class(); !>"> ----- !=?
function display_body_class()
{
    global $post;
    if($post){
       echo $post->post_name;
    }
}

/*=====  End of Body  ======*/


/*==========================================
=                    MENU                  =
==========================================*/

/*----------  Initialisation et Création des zones de menu  ----------*/
add_action( 'init', 'add_menu' );

	function add_menu() {
		register_nav_menus(
			array(
				'primary' 		=> 'Principal',
				'secondary' 	=> 'Secondaire',
				'footer' 		=> 'Pied de page'
				// 'name'		=> 'Name'
			)
		);
	}

/*----------  Fonction de positionnement avec appel du template  ----------*/
// Les Walkers sont dans le template

// Affiche du menu Primary
function display_primary_nav()
{
    include (get_template_directory().'/_templates/navigation/primary-nav.php');
}

// Affiche du menu Secondary
function display_secondary_nav()
{
    include (get_template_directory().'/_templates/navigation/secondary-nav.php');
}

// Affiche du menu Footer
function display_footer_nav()
{
    include (get_template_directory().'/_templates/navigation/footer-nav.php');
}

// Affiche du menu Name
// function display_name_nav()
// {
//     include (get_template_directory().'/_templates/navigation/_ex_name-nav.php');
// }

/*=====  End of MENU  ======*/


/*=============================
=            Aside            =
=============================*/

// add_action( 'widgets_init', function() {
// 	register_sidebar( array(
// 		'name'          => 'Barre latérale',
// 		'id'            => 'aside',
// 		'description'   => 'Ajouter les widgets ici pour les afficher dans la Barre latérale',
// 		'before_widget' => '<aside class="aside %1$s %2$s" role="complementary">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<p class="box-title">',
// 		'after_title'   => '</p>',
// 	) );
// });

/*=====  End of Aside  ======*/

?>