<?php
namespace Elementor\Core\Behaviors\Interfaces;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

interface Lock_Behavior {

	/**
	 * @return bool
	 */
	public function is_locked();

	/**
	 * @return array {
	 *
	 *    @type bool $is_locked
	 *
	 *    @type array $badge {
	 *         @type string $icon
	 *         @type string $text
	 *     }
	 *
	 *    @type array $content {
	 *         @type string $heading
	 *         @type string $description
	 *   }
	 *
	 *    @type array $button {
	 *         @type string $text
	 *         @type string $url
	 *   }
	 *
	 * }
	 */
	public function get_config();
}
