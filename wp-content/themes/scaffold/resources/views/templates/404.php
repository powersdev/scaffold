<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package scaffold
 */

?>
	<main id="primary" class="site-main">
		<section class="error-404 not-found">

			<header class="page-header">
				<h1 class="page-title">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'scaffold' ); ?>
				</h1>
			</header>

			<div class="page-content">
				<p>
					<?php esc_html_e( 'Can\'t find what you\'re looking for? Try a search or browse our recent posts.', 'scaffold' ); ?>
				</p>

				<?php get_search_form(); ?>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			</div>

		</section>
	</main>

<?php
