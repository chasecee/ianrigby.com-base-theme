<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
 	  // Get the theme data.
 	  $the_theme = wp_get_theme();

		// Enqueue CSS
 	  // Bootstrap and Understrap base css
 	  wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );

 	  wp_enqueue_style( 'understrap-gravity-styles', get_template_directory_uri() . '/css/gravitystyles.css', array(), $the_theme->get( 'Version' ) );

 	  wp_enqueue_style( 'understrap-stylescss', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get( 'Version' ) );

 	  // Enqueue Scripts
 	  wp_enqueue_script( 'jquery' );

 	  wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);

 	  wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );

		wp_enqueue_script('masonry');

 	  wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array(), $the_theme->get( 'Version' ), true );

 	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

if ( ! function_exists( 'load_fonts' ) ) {

	function load_fonts() {
		// Google Fonts
		wp_enqueue_style( 'understrap-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400', false );
	}

}

add_action( 'wp_enqueue_scripts', 'load_fonts' );
