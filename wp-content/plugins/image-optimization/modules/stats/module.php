<?php
namespace ImageOptimization\Modules\Stats;

use ImageOptimization\Classes\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Module extends Module_Base {
	public function get_name(): string {
		return 'stats';
	}

	public static function component_list(): array {
		return [
			'Optimization_Stats_Handler',
		];
	}
	public static function routes_list() : array {
		return [
			'Get_Stats',
<<<<<<< HEAD
			'Get_Optimization_Details',
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		];
	}

	/**
	 * Module constructor.
	 */
	public function __construct() {
		$this->register_routes();
		$this->register_components();
	}
}
