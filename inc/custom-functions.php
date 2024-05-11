<?php
/**
 * AO Dev Custom Functions
 * Description: Add your custom functions here. Consider this your functions.php file
 *
 */

 // Custom Gravity Form button markup
 if ( ! function_exists( 'gf_make_submit_input_into_a_button_element' ) ) {
    function gf_make_submit_input_into_a_button_element($button_input, $form) {

     //save attribute string to $button_match[1]
     preg_match("/<input([^\/>]*)(\s\/)*>/", $button_input, $button_match);

     //remove value attribute
     $button_atts = str_replace("value='".$form['button']['text']."' ", "", $button_match[1]);

     //add to button class
     $button_atts = str_replace("class='gform_button button'", "class='gform_button button btn btn-primary'", $button_match[1]);

     return '<button '.$button_atts.'>'.$form['button']['text'].'</button>';
    }
 }
 add_filter('gform_submit_button', 'gf_make_submit_input_into_a_button_element', 10, 2);

if ( ! function_exists( 'share_buttons_function' ) ) {
  function share_buttons_function($atts){

    $permalink = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    $title_plain = get_the_title();
    $content = urlencode(get_the_content());
    $image_url = get_the_post_thumbnail_url();

    $yoast_meta_title = get_post_meta( get_the_ID(),'_yoast_wpseo_title', true);
    $yoast_meta_desc = get_post_meta( get_the_ID(),'_yoast_wpseo_metadesc', true);
    $twitter_meta_title = get_post_meta(get_the_ID(), '_yoast_wpseo_twitter-title', true);
    $twitter_meta_description = get_post_meta(get_the_ID(), '_yoast_wpseo_twitter-description', true);

    // if there is just a description in Yoast Seo,
    // ONLY share that description without a url even
    if ($twitter_meta_title && $twitter_meta_description) {
      $twitter_share_text = $twitter_meta_title . ' - ' . $twitter_meta_description;
      $twitter_url = $url;
    } elseif (!$twitter_meta_title){
      $twitter_share_text = $twitter_meta_description;
      $twitter_url = '';
    } else{
      $twitter_share_text = $title . ' - ' . $content;
      $twitter_url = $url;
    }

    extract(shortcode_atts(array(
      'url' => $permalink,
    ), $atts));

    $return_string = "<div class='share_links'>";

    // $return_string .= $yoast_meta_title;
    // $return_string .= $twitter_share_text;

      if( have_rows('share_links_group','options') ): while( have_rows('share_links_group','options') ): the_row();

        if (get_sub_field('share_on_facebook')):
          $return_string .= '<a title="Share '. $title_plain .' on Facebook" target="_blank" class="social_facebook" href="https://www.facebook.com/sharer/sharer.php?u=' . $url . ' "><i class="fa fa-facebook"></i></a>';
        endif;

        if (get_sub_field('share_on_twitter')):
          $return_string .= '<a title="Share '. $title_plain .' on Twitter" target="_blank" class="social_twitter" href="https://twitter.com/intent/tweet?text=' . $twitter_share_text . '&url=' . $twitter_url . ' "><i class="fa fa-twitter"></i></a>';
        endif;

        if (get_sub_field('share_on_google_plus')):
          $return_string .= '<a title="Share '. $title_plain .' on Google Plus" target="_blank" class="social_google_plus" href="https://plus.google.com/share?url=' . $url . ' "><i class="fa fa-google-plus"></i></a>';
        endif;

        if (get_sub_field('share_on_linkedin')):
          $return_string .= '<a title="Share '. $title_plain .' on LinkedIn" target="_blank" class="social_linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $url . ' "><i class="fa fa-linkedin"></i></a>';
        endif;

        if (get_sub_field('share_on_pinterest')):
          $return_string .= '<a title="Share '. $title_plain .' on Pinterest" target="_blank" class="social_pinterest" href="https://www.pinterest.com/pin/create/button/?url=' . $url . '&media=' . $image_url . '&description=' . $content . '"><i class="fa fa-pinterest"></i></a>';
        endif;

        if (get_sub_field('share_with_email')):
          $return_string .= '<a title="Share '. $title_plain .' via Email" class="social_email" target="_blank" href="mailto:?&subject=' . $title .'&body=Check Out: ' . $url . ' :%0D%0A%0D%0A' . $content .'"><i class="fa fa-envelope"></i></a>';
        endif;

      endwhile; endif;

    $return_string .= '</div> <!--end Social Buttons -->';

    return $return_string;
 }
} // if function exists
  function register_shortcodes(){
    if( get_field('share_buttons' , 'option') ):
      add_shortcode('share-buttons', 'share_buttons_function');
    endif;
}
add_action( 'init', 'register_shortcodes');

// ACF Custom Admin Title
// Found at http://serversideguy.com/2017/03/28/how-can-i-create-custom-titles-for-advanced-custom-fields-flexible-content-blocks/
if ( ! function_exists( 'my_layout_title' ) ) {
  function my_layout_title($title, $field, $layout, $i) {
    if($value = get_sub_field('layout_title')) {
      return $title . " - " . $value;
    } else {
      foreach($layout['sub_fields'] as $sub) {
        if($sub['name'] == 'layout_title') {
          $key = $sub['key'];
          if(array_key_exists($i, $field['value']) && $value = $field['value'][$i][$key])
            return $title . " - " . $value;
        }
      }
    }
    return $title;
  }
  }
add_filter('acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4);
