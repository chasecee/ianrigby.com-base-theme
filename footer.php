<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );

// acf variables
if( function_exists('get_field')) {
	$footer_menu = get_field('footer_menu','option');
	$show_copyright = get_field('show_copyright','option');
	$footer_text = get_field('footer_text','option');
	$show_copyright_border = get_field('show_copyright_border','option');
	$social_links_enable = get_field('social_links_enable','option');

}

if($show_copyright_border) {
		$border_classes = "border border-dark py-2 px-3 d-inline-block";
	} else {
		$border_classes = "";
}
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper bg-light" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<?php if( $social_links_enable ): ?>

					<?php get_template_part('template-parts/sociallinks'); ?>

				<?php endif; // $social_links_enable ?>

				<footer class="site-footer" id="colophon">

					<?php if( $footer_menu ): ?>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'navbar navbar-expand-md text-center',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav  ml-auto mr-auto justify-content-center',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); // $social_links_enable ?>

					<?php endif; //$footer_menu ?>

					<?php if( $show_copyright ): ?>

						<div class="site-info text-center text-muted">

	                            <?php if( $footer_text ) { ?>

	                                <span class="<?php echo $border_classes; ?>"><?php echo $footer_text; ?></span>

	                            <?php } else { ?>

	                                    <?php echo "Copyright "; echo date("Y"); ?>

	                            <?php } ?>

						</div><!-- .site-info -->

					<?php endif; // $show_copyright ?>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
