<?php
/**
 * The template for displaying archive pages
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header>

		<?php
		while ( have_posts() ) :
			the_post();

			Partial::render( 'content' );
		endwhile;

		the_posts_navigation();

	else :
		Partial::render( 'content-none' );
	endif;
	?>

</main>
