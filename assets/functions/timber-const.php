<?php
// Timber construct
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

class OpusWp extends TimberSite {
	
	function __construct() {          
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
	}

	function add_to_context($context){
	    /* this is where you can add your own data to Timber's context object */
	    $context['foo'] = 'bar';
	    $context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['pri']   = new TimberMenu('primary');
		$context['sec']   = new TimberMenu('secondary');
		$context['mble']  = new TimberMenu('mobile');
		$context['site'] = $this;
	    return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}


}
new OpusWp();