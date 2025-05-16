<?php

namespace Automattic\WooCommerce\Blueprint\Steps;

/**
 * Set site options step.
 */
class SetSiteOptions extends Step {
	/**
	 * Site options.
	 *
	 * @var array site options
	 */
	private array $options;

	/**
	 * Constructor.
	 *
	 * @param array $options site options.
	 */
	public function __construct( array $options = array() ) {
		$this->options = $options;
	}

	/**
	 * Get the name of the step.
	 *
	 * @return string step name
	 */
	public static function get_step_name(): string {
		return 'setSiteOptions';
	}

	/**
	 * Get the schema for the step.
	 *
	 * @param int $version schema version.
	 *
	 * @return array schema for the step
	 */
	public static function get_schema( int $version = 1 ): array {
		return array(
			'type'       => 'object',
			'properties' => array(
				'step'    => array(
					'type' => 'string',
					'enum' => array( static::get_step_name() ),
				),
<<<<<<< HEAD

			),
			'required'   => array( 'step'  ),
=======
				'options' => array(
					'type'                 => 'object',
					'additionalProperties' => new \stdClass(),
				),
			),
			'required'   => array( 'step', 'options' ),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		);
	}

	/**
	 * Prepare the step for JSON serialization.
	 *
	 * @return array array representation of the step
	 */
	public function prepare_json_array(): array {
		return array(
			'step'    => static::get_step_name(),
<<<<<<< HEAD
			'options' => (object) $this->options,
=======
			'options' => $this->options,
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		);
	}
}
