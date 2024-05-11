<?php
  //thumbnail conditional setup
  if ( has_post_thumbnail() ) { $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $postthumburl = $postthumb['0']; }
  elseif (get_field('default_post_image','option')){ $postthumburl = get_field('default_post_image','option'); }
  else {   $postthumburl = "https://via.placeholder.com/350x150?text=";
    //get_template_directory_uri() . '/inc/img/default-image.jpg';
  }
?>
<div class="card mb-3">
  <img src="<?php echo $postthumburl; ?>" class="card-img-top" alt="<?php the_title(); ?>"/>
  <div class="card-body">
    <?php
    if (function_exists('get_field') && get_field('read_more_links_to_url')) {
      if (get_field('url_or_file') == 'URL') {
        $post_link = get_field('read_more_url') ? get_field('read_more_url') : get_permalink();
      } else if (get_field('url_or_file') == 'File') {
        $post_link = get_field('read_more_file')['url'] ? get_field('read_more_file')['url'] : get_permalink();
      }

      $open_new_window = get_field('open_link_in_new_tab') ? 'target="_blank"' : '';
    } else {
      $post_link = get_permalink();
      $open_new_window = '';
    }
    ?>

    <h4 class="card-title">
      <a href="<?php echo $post_link ?>" title="<?php the_title();?>" <?php echo $open_new_window; ?>>
        <?php the_title();?>
      </a>
      <br/>
      <small class="date text-muted">
          <?php echo get_the_date( 'F j, Y' ); ?>
      </small>
    </h4>
    <div class="card-text">
      <?php the_excerpt();?>
    </div>

    <a href="<?php echo $post_link  ?>" title="<?php the_title();?>" class="btn btn-secondary" <?php echo $open_new_window; ?>>Read More <i class="fa fa-angle-right"></i> </a>

    <?php $shortcode = '[ssba url='. get_permalink() . ']';
    //  echo do_shortcode( $shortcode );
    ?>
</div><!-- end .card-body -->
</div><!-- end .card -->
