<h3 class="">Recent Posts</h3>
<div class="row anim_parent">
  <?php
    $the_query = new WP_Query( 'posts_per_page=3' ); while ($the_query -> have_posts()) : $the_query -> the_post();
    ?>
    <div class="col-sm-4 ">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
        <?php
          //thumbnail conditional setup
          if ( has_post_thumbnail() ) { $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); $postthumburl = $postthumb['0']; }
          elseif (get_field('default_post_image','option')){ $postthumburl = get_field('default_post_image','option'); }
          else {   $postthumburl = get_template_directory_uri() . '/inc/img/default-image.jpg'; }
        ?>
        <img src="<?php echo $postthumburl; ?>" />
        <div class="">
          <h4><?php the_title(); ?></h4>
        </div>
      </a>
    </div>
  <?php endwhile; wp_reset_postdata(); ?>
</div><!-- end posts .row -->
