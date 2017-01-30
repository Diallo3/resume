<?php
/**
 * The main template file
 * E.g., it puts together the home page when no home.php file exists
 *
 * @package  OpusWP
 * @subpackage  Templates
 * @since   3.0
 */

	if ( ! class_exists( 'Timber' ) ) {
		echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
		return;
	}
	$context = Timber::get_context();
	$context['posts'] = Timber::get_posts();
	$templates = array( 'index.twig' );
	if ( is_home() ) {
		array_unshift( $templates, 'front-page.twig', 'home.twig' );
	}
	Timber::render( $templates, $context );
?>