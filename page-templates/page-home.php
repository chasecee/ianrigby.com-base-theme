<?php
/*
Template Name: Home Page
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part('template-parts/flexible-content'); ?>

<div class="wrapper-top wrapper bg-light py-5">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row align-items-center">

          <div class="col-md-6 col-lg-8 mb-3">
            <h1 class="display-3">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </div>

          <div class="col-md">
            <?php echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true" tabindex=""]'); ?>
          </div>

        </div>
    </div><!-- .container end -->
</div><!-- .wrapper end -->


<?php
get_footer();
