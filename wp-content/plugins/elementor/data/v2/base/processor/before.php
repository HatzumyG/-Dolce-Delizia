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

abstract class Before extends Processor {

	/**
	 * Get conditions for running processor.
<<<<<<< HEAD
	 *
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 * @param array $args
	 *
	 * @return bool
	 */
	public function get_conditions( $args ) {
		return true;
	}

	/**
	 * Apply processor.
	 *
	 * @param array $args
	 *
	 * @return mixed
	 */
	abstract public function apply( $args );
}
