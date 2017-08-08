<ul id="secondary-nav" class="header-nav-list secondary-nav-list secondary-nav-list_l1 reset-list no-first">
	<?php
		// Création de la nav
		$secondary_menu_config = array(
			'theme_location'  => 'secondary',
			'menu'            => '',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'echo'            => true,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 1,
			'walker'          => new Secondary_Walker()
		);
		wp_nav_menu( $secondary_menu_config );
	?>
</ul>

<?php
	// Walker du Secondary nav
	class Secondary_Walker extends Walker_Nav_Menu {

	// création des ul level 2 et sup
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		// indentation du code
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
		// parceque l'index commence à 0
		$display_depth = ( $depth + 2);
		// classes communes et en fonction de la profondeur
		$class_names = 'header-nav-list secondary-nav-list_l' . $display_depth . ' secondary-nav-list reset-list no-first';
		// construction du <ul>
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";

	} // end start_lvl()

	// création des li tous level
	function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		// indentation du code
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		// parceque l'index commence à 0
		$display_depth = ( $depth + 1);
		// classes communes et en fonction de la profondeur
		$depth_class_names = 'header-nav-item secondary-nav-item secondary-nav-item_l' . $display_depth;
		// classes wordpress
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		// supprime tous les classes sauf celles précisées dans le tableau
		$clean_classes = is_array($classes) ? array_intersect($classes, array('current-menu-item','menu-item-has-children','current-menu-parent')) : '';
		// correpondance avec de nouvelles classes
		$new_classes = array(
			'current-menu-item' => 'is-active',
			'menu-item-has-children' => 'is-parent',
			'current-menu-parent' => 'is-active'
		);
		// indique à wordpress d'utiliser les nouvelles classes
		$clean_classes = str_replace(array_keys($new_classes), $new_classes, $clean_classes);
		$class_names = esc_attr( implode(' ', apply_filters('nav_menu_css_class', array_filter($clean_classes ), $item)));
		// construction du <li>
		$output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';
		// construction du <a>
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="header-nav-link secondary-nav-link secondary-nav-link_l'.$display_depth.'"';
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s%7$s</a>%8$s',
			$args->before,
			$attributes,
			$args->link_before,
			'<span class="header-nav-link-inner secondary-nav-link-inner secondary-nav-link-inner_l' . $display_depth . '">',
			apply_filters( 'the_title', $item->title, $item->ID ),
			'</span>',
			$args->link_after,
			$args->after
		);
		// indique à wordpress la nouvelle structure à utiliser
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	} // end start_el()

} // end Secondary_Walker()
?>