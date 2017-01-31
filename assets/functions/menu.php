<?php
// Register menus
register_nav_menus(
	array(
		'primary'   => __( 'Primary Menu', 'jointswp' ),   // Primary or Main menu usually the header
		'secondary' => __( 'Secondary Menu', 'jointswp' ), // Secondary menu, usually the footer
        'mobile'    => __( 'Mobile', 'jointswp' ) // Offcanvas type menu
	)
);

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );