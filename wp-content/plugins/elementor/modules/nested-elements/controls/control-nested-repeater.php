<?php
namespace Elementor\Modules\NestedElements\Controls;

use Elementor\Control_Repeater;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Changing the default repeater control behavior for custom item title defaults.
 * For custom management of nested repeater controls.
 */
class Control_Nested_Repeater extends Control_Repeater {

	const CONTROL_TYPE = 'nested-elements-repeater';

	public function get_type() {
		return static::CONTROL_TYPE;
	}
}
