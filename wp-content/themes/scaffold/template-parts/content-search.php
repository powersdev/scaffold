<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scaffold
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'prose' ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php echo get_the_date(); ?>
			<?php the_author(); ?>
		</div>
		<?php endif; ?>
	</header>

	<?php the_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php the_entry_footer(); ?>
	</footer>
</article>
