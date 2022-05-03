<?php
/**
 * The template for displaying search results pages
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php /* Translators: Search term. */ ?>
				<?php printf( esc_html__( 'Search Results for: %s', 'scaffold' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</header>

		<?php
		while ( have_posts() ) :
			the_post();

			Partial::render( 'content-search' );
		endwhile;

		the_posts_navigation();
	else :
		Partial::render( 'content-none' );
	endif;
	?>

</main>

