<?php
/**
 * Base Context
 *
 * @package scaffold
 */

namespace Scaffold\Context;

use Scaffold\Traits\Singleton;

/**
 * Base Context
 */
class Base {

	use Singleton;

	/**
	 * Context.
	 *
	 * @var array
	 */
	public array $data;

	/**
	 * Class Constructor
	 */
	public function __construct() {
		$this->data = $this->with();
	}

	/**
	 * Context data.
	 *
	 * @return array
	 */
	private function with(): array {
		return array(
			'post' => array(
				'id'          => get_the_ID(),
				'title'       => get_the_title(),
				'content'     => get_the_content(),
				'excerpt'     => get_the_excerpt(),
				'date'        => get_the_date(),
				'post_type'   => get_post_type(),
				'permalink'   => get_the_permalink(),

				'class'       => implode( ' ', get_post_class() ),
				'is_singular' => is_singular(),

				'author'      => array(
					'name'      => get_the_author_meta( 'display_name' ),
					'permalink' => get_the_author_meta( 'user_url' ),
				),

				'thumbnail'   => array(
					'src' => get_the_post_thumbnail_url(),
					'alt' => get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ),
				),
			),
		);
	}
}
