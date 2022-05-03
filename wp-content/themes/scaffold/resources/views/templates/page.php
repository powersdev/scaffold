<?php
/**
 * The template for displaying all pages
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		Partial::render( 'content' );

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile;
	?>

</main>
