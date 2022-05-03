<?php
/**
 * The main template file
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header>
			<h1 class="page-title screen-reader-text">
				<?php single_post_title(); ?>
			</h1>
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
