<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AO_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
  <?php } ?>

	<header class="entry-header">
		<h1>
			<?php the_title(); ?>
			<br/>
			<small class="date">
				<em>
					<?php echo get_the_date( 'F j, Y' ); ?>
				</em>
			</small>
		</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aobase' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer text-center">
		<hr>
		<h2 style=" margin: 0; display: inline-block; font-size: 28px; vertical-align: top; "><small><em>Share this: </em></small></h2>
		<div style="display:inline-block;"><?php echo do_shortcode('[ssba]'); ?></div>
		<hr>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
