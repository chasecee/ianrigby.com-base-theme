<?php
/**
 * Understrap modify editor
 *
 * @package understrap
 */

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// Add TinyMCE style formats.
add_filter( 'mce_buttons_2', 'understrap_tiny_mce_style_formats' );

function understrap_tiny_mce_style_formats( $styles ) {

    array_unshift( $styles, 'styleselect' );
    return $styles;
}

add_filter( 'tiny_mce_before_init', 'understrap_tiny_mce_before_init' );

function understrap_tiny_mce_before_init( $settings ) {

  $style_formats = array(
      array(
          'title' => 'Display Headings (h1)',
          'items' => array(
              array(
                'title' => 'Display 1',
                'selector' => 'h1',
                'classes' => 'display-1',
                'wrapper' => true
                ),
              array(
                'title' => 'Display 2',
                'selector' => 'h1',
                'classes' => 'display-2',
                'wrapper' => true
                ),
              array(
                'title' => 'Display 3',
                'selector' => 'h1',
                'classes' => 'display-3',
                'wrapper' => true
                ),
              array(
                  'title' => 'Display 4',
                  'selector' => 'h1',
                  'classes' => 'display-4',
                  'wrapper' => true
                  )
              )
          ),
  array(
      'title' => 'Buttons (a)',
      'items' => array(
          array(
            'title' => 'Button Primary',
            'selector' => 'a',
            'classes' => 'btn btn-primary',
          ),
          array(
            'title' => 'Button Secondary',
            'selector' => 'a',
            'classes' => 'btn btn-secondary',
          )

          )
      ),
      array(
          'title' => 'Lead Paragraph',
          'selector' => 'p',
          'classes' => 'lead',
          'wrapper' => true
          ),
      array(
          'title' => 'Small',
          'inline' => 'small'
      ),
      array(
          'title' => 'Blockquote',
          'block' => 'blockquote',
          'classes' => 'blockquote',
          'wrapper' => true
      )
  );

    if ( isset( $settings['style_formats'] ) ) {
      $orig_style_formats = json_decode($settings['style_formats'],true);
      $style_formats = array_merge($orig_style_formats,$style_formats);
    }

    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
