<?php
namespace Elementor\Data\Base\Processor;

use Elementor\Data\Base\Processor;

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
