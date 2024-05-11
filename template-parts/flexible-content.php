<?php

if( have_rows('sections') ):

  while ( have_rows('sections') ) : the_row();

    // variables
    $id = get_sub_field('id');
    $classes = get_sub_field('classes');
    $disable_section = get_sub_field('disable_section');
    $contain_wrapper = get_sub_field('contain_wrapper');
    $custom_stylescript = get_sub_field('custom_stylescript');
    $background_color = get_sub_field('background_color');
    $background_image = get_sub_field('background_image');
    $text_color = get_sub_field('text_color');
    $container_html = '<div class="container">';
    $container_html_end = '</div><!-- end container -->';

    // style conditional
    $wrapper_style = ''; // start string
    if($background_color){ $wrapper_style .= 'background-color:'. $background_color . '; '; }
    if($background_image){ $wrapper_style .= 'background-image:url('. $background_image['url'] . '); '; }
    if($text_color){ $wrapper_style .= 'color:'. $text_color . ';'; }

    // wrapper classes string
    $wrapper_classes = $classes . ' wrapper wrapper_' . get_row_layout() . ' wrapper_' . get_row_index() . ' ' .  (count(get_field('sections')) == get_row_index() ? 'last ' : '') . (1 == get_row_index() ? 'first ' : '');

    // end variable setup
    ?>

    <?php if (!$disable_section): ?>

      <?php if($contain_wrapper){ echo $container_html; } ?>

        <div class="<?php echo $wrapper_classes; ?>" id="<?php echo $id ?>" style="<?php echo $wrapper_style; ?>" >

          <?php if(!$contain_wrapper){ echo $container_html; } ?>


          <?php if( get_row_layout() == 'content_block' ): ?>

            <?php get_template_part('template-parts/fc-layouts/layout','content_block'); ?>

          <?php elseif( get_row_layout() == 'top_section' ): ?>

            <?php get_template_part('template-parts/fc-layouts/layout','topsection'); ?>

          <?php elseif( get_row_layout() == 'video_embed' ): ?>

                <?php get_template_part('template-parts/fc-layouts/layout','embed'); ?>

          <?php elseif( get_row_layout() == 'news' ): ?>

                  <?php get_template_part('template-parts/fc-layouts/layout','news'); ?>

            <?php endif; // end get row layout ?>

          <?php ?>

          <?php if(!$contain_wrapper){ echo $container_html_end; } // end container ?>

      </div><!-- end .wrapper -->

        <?php if($contain_wrapper){ echo $container_html_end; } // end container outside of wrapper ?>

      <?php endif; // $disable_section

  endwhile;

else :?>
    <!-- no layouts found -->
<?php endif; ?>
