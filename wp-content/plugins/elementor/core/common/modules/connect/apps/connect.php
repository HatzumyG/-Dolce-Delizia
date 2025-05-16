<?php
namespace Elementor\Core\Common\Modules\Connect\Apps;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Connect extends Common_App {

	public function get_title() {
		return esc_html__( 'Connect', 'elementor' );
	}

	/**
	 * @since 2.3.0
	 * @access public
	 */
	protected function get_slug() {
		return 'connect';
	}

	/**
	 * @since 2.3.0
	 * @access public
	 */
	public function render_admin_widget() {}
}
