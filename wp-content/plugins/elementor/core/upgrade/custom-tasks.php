<?php
namespace Elementor\Core\Upgrade;

use Elementor\Tracker;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Custom_Tasks {
	public static function opt_in_recalculate_usage( $updater ) {
		return Upgrades::recalc_usage_data( $updater );
	}

	public static function opt_in_send_tracking_data() {
		Tracker::send_tracking_data( true );
	}
}
