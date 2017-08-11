<ul id="footer-nav" class="footer-nav-list list-unstyled">
	<?php
		// Création de la nav
		$footer_shortcuts_config = array(
			'theme_location'  => 'footer',
			'menu'            => '',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 1,
			'walker'          => new Footer_Walker()
		);
		wp_nav_menu( $footer_shortcuts_config );
		// + d'infos inc/navigation.php
	?>
</ul>

<?php 
	class Footer_Walker extends Walker_Nav_Menu {

	// création des li
	function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		// indentation du code
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		// classes wordpress
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		// supprime tous les classes sauf celles précisées dans le tableau
		$clean_classes = is_array($classes) ? array_intersect($classes, array('current-menu-item','menu-item-has-children','current-menu-parent')) : '';
		// correpondance avec de nouvelles classes
		$new_classes = array(
			'current-menu-item' => 'is-active'
		);
		// indique à wordpress d'utiliser les nouvelles classes
		$clean_classes = str_replace(array_keys($new_classes), $new_classes, $clean_classes);
		$class_names = esc_attr( implode(' ', apply_filters('nav_menu_css_class', array_filter($clean_classes ), $item)));
		// cnstruction du <li>
		$output .= $indent . '<li class="footer-nav-item ' . $class_names . '">';
		// construction du <a>
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="footer-nav-link"';
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);
		// indique à wordpress la nouvelle structure à utiliser
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	} // end start_el()

} // end Footer_Walker()
?>