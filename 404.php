<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found text-center">

						<header class="page-header">
							<span class="fa-stack fa-lg" style=" font-size: 5rem; ">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-question fa-stack-1x fa-inverse"></i>
							</span>
							<h1 class="page-title display-3"><?php esc_html_e( 'Oops!',
							'understrap' ); ?></h1>
							<h4 class="display-5"><?php esc_html_e( 'That page can&rsquo;t be found.',
							'understrap' ); ?></h4>


						</header><!-- .page-header -->

						<div class="page-content">
                            <div class="row padder_lg">
                                <div class="col-12">

        							<p>
                                        <?php esc_html_e( 'It looks like nothing was found at this location.',
        							'understrap' ); ?>
											<div class="w-100"></div>
                                        <a href="<?php echo get_home_url(); ?>" class="btn btn-primary btn-lg" role="button">Home Page</a>
                                    </p>

                                </div>
                            </div>



						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
