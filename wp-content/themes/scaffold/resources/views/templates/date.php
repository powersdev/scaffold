<?php
/**
 * The date archive template file
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) :

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
