<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AO_Base
 */

?>
<article id="post-<?php the_ID(); ?>" class="">

	<?php
	// added this because titles always get messed up sitewide, this standardizes it.
	get_template_part('template-parts/page-title');
	?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aobase' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
