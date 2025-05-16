<?php
namespace Elementor\Data\V2\Base\Processor;

use Elementor\Data\V2\Base\Processor;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

abstract class After extends Processor {

	/**
	 * Get conditions for running processor.
	 *
	 * @param array $args
	 * @param mixed $result
	 *
	 * @return bool
	 */
	public function get_conditions( $args, $result ) {
		return true;
	}

	/**
	 * Apply processor.
	 *
	 * @param $args
	 * @param $result
	 *
	 * @return mixed
	 */
	abstract public function apply( $args, $result );
}
