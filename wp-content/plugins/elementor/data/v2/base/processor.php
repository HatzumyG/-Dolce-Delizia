<?php
namespace Elementor\Data\V2\Base;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Processor is just typically HOOK, who called before or after a command runs.
 * It exist to simulate frontend ($e.data) like mechanism with commands and hooks, since each
 * controller or endpoint is reachable via command (get_format).
 * The `Elementor\Data\V2\Manager::run` is able to run them with the ability to reach the endpoint.
 */
abstract class Processor {

	/**
	 * Controller.
	 *
	 * @var \Elementor\Data\V2\Base\Controller
	 */
	private $controller;

	/**
	 * Get processor command.
	 *
	 * @return string
	 */
	abstract public function get_command();

	/**
	 * Processor constructor.
	 *
	 * @param \Elementor\Data\V2\Base\Controller $controller
	 */
	public function __construct( $controller ) {
		$this->controller = $controller;
	}
}
