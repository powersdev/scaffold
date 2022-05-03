<?php
/**
 * The front page template file
 *
 * @package scaffold
 */

use Scaffold\Partial;

?>

<main id="primary" class="site-main">

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
	?>

</main>
