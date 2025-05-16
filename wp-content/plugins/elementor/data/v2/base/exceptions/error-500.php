<?php
namespace Elementor\Data\V2\Base\Exceptions;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Error_500 extends Data_Exception {

	protected function get_http_error_code() {
		return 500;
	}

	public function get_code() {
		return 'internal-server-error';
	}

	public function get_message() {
		return 'Something went wrong';
	}
}
