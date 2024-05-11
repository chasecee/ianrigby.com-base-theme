<div class="social_links">
   <?php

    // check if the repeater field has rows of data
    if( have_rows('social_links','options') ):
      // loop through the rows of data
      while ( have_rows('social_links','options') ) : the_row(); ?>
        <a href="<?php the_sub_field('link'); ?>" target="_blank">
          <span class="social-share-buttons" style="background-color: <?php the_sub_field('background_color'); ?>; color: <?php the_sub_field('color'); ?>">
            <?php the_sub_field('font_awesome'); ?>
          </span>
        </a>

      <?php endwhile;

    endif;

  ?>
</div><!-- .social_links -->
