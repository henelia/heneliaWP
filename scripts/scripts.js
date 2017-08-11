/*=================================================
=            Variables d'environnement            =
=================================================*/

var tailleTablet = 768;  
var tailleDesktop = 992;

/*=====  End of Variables d'environnement  ======*/


jQuery(document).ready(function() {

	
	
	/*==================================
	=            Responsive            =
	==================================*/

	// fonction executée au chargement de la page et à chaque modification de largeur du navigateur
	function screenChange()
    {
		taille = jQuery(window).width();
		
		if (taille >= tailleDesktop) { 
			jQuery('body').removeClass('is-nav-open');
		} else {

		}
	} 
 
	screenChange();

	jQuery(window).resize(function()
    {
		if (taille != jQuery(window).width()) { 
			screenChange();
		} 
	}); 
	
	/*=====  End of Responsive  ======*/
 
	/*==============================
	=            Projet            =
	==============================*/

	/*=====  End of Projet  ======*/


	/*============================
	=            Menu            =
	============================*/
	
	jQuery('.navbar-toggle').click(function() {
		jQuery('body').toggleClass('is-nav-open');
	});
	jQuery('.fn-nav-overlay').click(function() {
		jQuery('body').toggleClass('is-nav-open');
		jQuery('.navbar-collapse').removeClass('in');
		jQuery('.navbar-collapse').attr('aria-expanded', 'false');
	});
	
	/*=====  End of Menu  ======*/

	/*===============================
	=            WYSIWYG            =
	===============================*/
	
	jQuery('.wp-wysiwyg iframe').each(function() {
		jQuery(this).wrap('<div class="embed-responsive embed-responsive-16by9">');
	});
	
	/*=====  End of WYSIWYG  ======*/
	
	
	
}( jQuery ));