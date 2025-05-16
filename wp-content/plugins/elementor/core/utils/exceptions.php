<?php
namespace Elementor\Core\Utils;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Elementor exceptions.
 *
 * Elementor exceptions handler class is responsible for handling exceptions.
 *
 * @since 2.0.0
 */
class Exceptions {

	/**
	 * HTTP status code for bad request error.
	 */
	const BAD_REQUEST = 400;

	/**
	 * HTTP status code for unauthorized access error.
	 */
	const UNAUTHORIZED = 401;

	/**
	 * HTTP status code for forbidden access error.
	 */
	const FORBIDDEN = 403;

	/**
	 * HTTP status code for resource that could not be found.
	 */
	const NOT_FOUND = 404;

	/**
	 * HTTP status code for internal server error.
	 */
	const INTERNAL_SERVER_ERROR = 500;
}
