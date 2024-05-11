<?php
/**
 * AO Dev Helper Functions
 *
 * Description: Displays media URL column in library, adds ACF theme options, adds ACF custom code to wp_head and wp_footer, removes WP emoji, cleans up admin menu
 */

/* display media URL column in library */

// function ao_column( $cols ) { 2285
//         $cols["media_url"] = "URL";
//         return $cols;
// }
// function ao_value( $column_name, $id ) {
//     $parsed = parse_url( wp_get_attachment_url( $column_name->ID ) );
//     $url    = dirname( $parsed [ 'path' ] ) . '/' . rawurlencode( basename( $parsed[ 'path' ] ) );
//
//     if ( $column_name == "media_url" ) echo '<input type="text" style="width:100%;" onclick="jQuery(this).select();" value="'. $url . '" />';
// }
// add_filter( 'manage_media_columns', 'ao_column' );
// add_action( 'manage_media_custom_column', 'ao_value', 10, 2 );


/* Adds ACF theme options */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
   'page_title' 	=> 'Theme General Options',
   'menu_title'	=> 'Theme Options',
   'menu_slug' 	=> 'theme-general-options',
   'capability'	=> 'edit_posts',
   'redirect'		=> false
  ));
  acf_add_options_sub_page(array(
   'page_title' 	=> 'Custom Code/Scripts',
   'menu_title'	=> 'Custom Code',
   'parent_slug'	=> 'theme-general-options',
  ));
}


/* Add ACF custom code to wp_head and wp_footer */
if ( ! function_exists( 'ao_hook_header' ) ) {
  function ao_hook_header() {
    if( function_exists('get_field')) {
      $head_scripts = get_field('head_scripts','option'); // Option in theme options
      $custom_scripts_styles = get_field('custom_scripts_styles'); // Option on pages/posts
      if($head_scripts){ echo $head_scripts; }
      if($custom_scripts_styles){ echo $custom_scripts_styles; }
    }
  }
}
add_action('wp_head','ao_hook_header');

if ( ! function_exists( 'ao_hook_footer' ) ) {
  function ao_hook_footer() {
    if( function_exists('get_field')) {
      $footer_scripts = get_field('footer_scripts','option'); // Option in theme options
      if($footer_scripts){ echo $footer_scripts; }
    }
  }
}
add_action('wp_footer','ao_hook_footer');

// need to create body hook since wp does not have one by default
if ( ! function_exists( 'ao_hook_body' ) ) {
  function ao_hook_body() {
    if( function_exists('get_field')) {
        $body_scripts = get_field('body_scripts','option'); // Option in theme options
        if($body_scripts){ echo $body_scripts; }
      }
    }
}
add_action('body_begin', 'ao_hook_body');



/* Remove WP emoji */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* Clean up admin menu */

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
      'index.php', // Dashboard
      'separator1', // First separator
      'edit.php', // Posts
      'edit.php?post_type=page', // Pages
      'gf_edit_forms', // Gravity Forms
      'upload.php', // Media
      'separator2', // Second separator
      'theme-general-options', // ACF theme options
      'nav-menus.php', // Menus
      'themes.php', // Appearance
      'separator-last', // Last separator
      'plugins.php', // Plugins
      'users.php', // Users
      'tools.php', // Tools
      'options-general.php', // Settings
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

function ao_admin_sidebar_remove() {
	$remove_menu_items = array(__('Links'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'ao_admin_sidebar_remove');

function ao_admin_icons_remove() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('wpseo-menu');
}
add_action('wp_before_admin_bar_render', 'ao_admin_icons_remove', 0);
