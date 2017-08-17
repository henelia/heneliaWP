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
                'title' => 'Bouton (Lien)',  
                'selector' => 'a',  
                'classes' => 'wysiwyg-btn btn btn-default',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Paragraphe intro',  
                'block' => 'p',  
                'classes' => 'wysiwyg-lead lead',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Ligne transparente (petite)',  
                'selector' => 'hr',  
                'classes' => 'wysiwyg-separator separator-small',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Ligne transparente (medium)',  
                'selector' => 'hr',  
                'classes' => 'wysiwyg-separator separator-medium',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Ligne transparente (grande)',  
                'selector' => 'hr',  
                'classes' => 'wysiwyg-separator separator-large',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Texte rouge',  
                'inline' => 'span',  
                'classes' => 'wysiwyg-red text-red',
                'wrapper' => false          
            ),
            array(  
                'title' => 'Texte bleu',  
                'inline' => 'span',  
                'classes' => 'wysiwyg-blue text-blue',
                'wrapper' => false          
            ),
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