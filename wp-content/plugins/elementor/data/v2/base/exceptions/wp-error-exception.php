<?php
namespace Elementor\Data\V2\Base\Exceptions;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class WP_Error_Exception extends Data_Exception {
	public function __construct( \WP_Error $wp_error ) {
		parent::__construct( $wp_error->get_error_message(), $wp_error->get_error_code(), [
			'status' => $wp_error->get_error_code(),
		] );
	}
}
