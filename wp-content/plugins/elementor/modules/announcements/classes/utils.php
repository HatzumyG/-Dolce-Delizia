<?php

namespace Elementor\Modules\Announcements\Classes;

use Elementor\Modules\Announcements\Triggers\{
	IsFlexContainerInactive, AiStarted
};

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Utils {
	/**
<<<<<<< HEAD
	 * Get trigger object.
=======
	 * get_trigger_object
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *
	 * @param $trigger
	 *
	 * @return IsFlexContainerInactive|false
	 */
	public static function get_trigger_object( $trigger ) {
		$object_trigger = apply_filters( 'elementor/announcements/trigger_object', false, $trigger );

		if ( false !== $object_trigger ) {
			return $object_trigger;
		}

<<<<<<< HEAD
		// @TODO - replace with trigger manager
=======
		//@TODO - replace with trigger manager
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		switch ( $trigger['action'] ) {
			case 'isFlexContainerInactive':
				return new IsFlexContainerInactive();
			case 'aiStarted':
				return new AiStarted();
			default:
				return false;
		}
	}
}
