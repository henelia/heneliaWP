<?php
/**
 *
 * Administration customisé
 * ! important : Une grosse partie de la gestion de l'admin se passe dans le plugin Henelia, le code inséré ici peut etre ajouté en support, pensez à aller y faire un tour
 *
 *
 */

/*=======================================
=            Tiny_MCE custom            =
=======================================*/

add_filter( 'tiny_mce_before_init', 'tinymce_he_styles' ); 

    function tinymce_he_styles( $init_array ) {  
        
        // liste des styles
        $style_formats = array(  
            array(  
                'title' => 'Bouton',  
                'selector' => 'a',  
                'classes' => 'btn-wysiwyg btn btn-default',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Paragraphe intro',  
                'block' => 'p',  
                'classes' => 'lead',
                'wrapper' => false          
            ),
            // array(  
            //     'title' => 'espace 30px',  
            //     'inline' => 'hr',  
            //     'classes' => 'separator-30',
            //     'wrapper' => false          
            // ),
        );      
        // mise à jour tu tableau en paramétre (JSON encodage)
        $init_array['style_formats'] = json_encode( $style_formats );  
        return $init_array;  
      
    }

add_action( 'admin_init', 'tinymce_he_css' );

    function tinymce_he_css() {

        add_editor_style( '_admin/he-wp-admin-style.css' );

    }

/*=====  End of Tiny_MCE custom  ======*/

/*===========================
=            SVG            =
===========================*/

/* Autoriser les fichiers SVG */
function svg_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'svg_mime_types');

/*=====  End of SVG  ======*/

?>