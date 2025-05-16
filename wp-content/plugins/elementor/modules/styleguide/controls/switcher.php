<?php
namespace Elementor\Modules\Styleguide\Controls;

use Elementor\Control_Switcher;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Switcher extends Control_Switcher {

	const CONTROL_TYPE = 'global-style-switcher';

	/**
	 * Get control type.
	 *
	 * Retrieve the control type, in this case `global-style-switcher`.
	 *
	 * @since 3.13.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return self::CONTROL_TYPE;
	}
}
