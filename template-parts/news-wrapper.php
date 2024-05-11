<?php
// Proper loop with pagination https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
// still need to fix pagination
?>
<?php //setup query
if ( is_front_page() ) {
  $front = 1;
  $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
  $postsperpage = '3';
} else {
  $front = 0;
  $paged = get_query_var('paged' ) ? get_query_var( 'paged' ) : 1;
  $postsperpage = '9';
}
$custom_query_args = array( 'posts_per_page'=>$postsperpage, 'paged' => $paged );
// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
?>
  <div class="row grid">
      <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

              <div class="grid-item col-sm-6 col-md-4">
                <?php get_template_part('template-parts/loop-post'); ?>
              </div><!--end .grid-item -->

      <?php endwhile; endif; ?>

      <div class="grid-sizer col-sm-6 col-md-4" style="min-height:0;z-index: -1;"></div>
  </div><!-- end .row .grid -->
  <div class="text-center pt-3">

      <?php if ( $front == 1 ) { ?>

        <a class="btn btn-primary" href="news" role="button">Read All <i class="fa fa-angle-right"></i> </a>

      <?php } else { ?>

        <?php
          // Pagination component
          understrap_pagination();
        ?>

      <?php } ?>

      <?php
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;
        wp_reset_postdata();
      ?>
    </div>
