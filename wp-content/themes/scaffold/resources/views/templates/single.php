<?php
/**
 * The template for displaying all single posts
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

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'scaffold' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'scaffold' ) . '</span> <span class="nav-title">%title</span>',
			)
		);
	endwhile;
	?>

</main>
