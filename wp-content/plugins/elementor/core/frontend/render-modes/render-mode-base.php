<?php
namespace Elementor\Core\Frontend\RenderModes;

use Elementor\Plugin;
use Elementor\Core\Base\Document;
use Elementor\Core\Frontend\Render_Mode_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

abstract class Render_Mode_Base {
	const ENQUEUE_SCRIPTS_PRIORITY = 10;
	const ENQUEUE_STYLES_PRIORITY = 10;

	/**
	 * @var int
	 */
	protected $post_id;

	/**
	 * @var Document
	 */
	protected $document;

	/**
	 * Render_Mode_Base constructor.
	 *
	 * @param $post_id
	 */
	public function __construct( $post_id ) {
		$this->post_id = intval( $post_id );
	}

	/**
	 * Returns the key name of the class.
	 *
<<<<<<< HEAD
	 * @throws \Exception If the `get_name` method is not implemented.
=======
	 * @return string
	 * @throws \Exception
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	public static function get_name() {
		throw new \Exception( 'You must implements `get_name` static method in ' . static::class );
	}

	/**
	 * @param $post_id
	 *
	 * @return string
<<<<<<< HEAD
	 * @throws \Exception If the `get_name` method is not implemented.
=======
	 * @throws \Exception
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	public static function get_url( $post_id ) {
		return Render_Mode_Manager::get_base_url( $post_id, static::get_name() );
	}

	/**
	 * Runs before the render, by default load scripts and styles.
	 */
	public function prepare_render() {
		add_action( 'wp_enqueue_scripts', function () {
			$this->enqueue_scripts();
		}, static::ENQUEUE_SCRIPTS_PRIORITY );

		add_action( 'wp_enqueue_scripts', function () {
			$this->enqueue_styles();
		}, static::ENQUEUE_STYLES_PRIORITY );
	}

	/**
	 * By default do not do anything.
	 */
<<<<<<< HEAD
	protected function enqueue_scripts() {}
=======
	protected function enqueue_scripts() {
		//
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

	/**
	 * By default do not do anything.
	 */
<<<<<<< HEAD
	protected function enqueue_styles() {}
=======
	protected function enqueue_styles() {
		//
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

	/**
	 * Check if the current user has permissions for the current render mode.
	 *
	 * @return bool
	 */
	public function get_permissions_callback() {
		return $this->get_document()->is_editable_by_current_user();
	}

	/**
	 * Checks if the current render mode is static render, By default returns false.
	 *
	 * @return bool
	 */
	public function is_static() {
		return false;
	}

	/**
	 * @return Document
	 */
	public function get_document() {
		if ( ! $this->document ) {
			$this->document = Plugin::$instance->documents->get( $this->post_id );
		}

		return $this->document;
	}
}
