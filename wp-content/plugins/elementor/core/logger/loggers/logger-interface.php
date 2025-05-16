<?php
namespace Elementor\Core\Logger\Loggers;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

interface Logger_Interface {
	const LEVEL_INFO = 'info';
	const LEVEL_NOTICE = 'notice';
	const LEVEL_WARNING = 'warning';
	const LEVEL_ERROR = 'error';
	const LOG_NAME = 'elementor_log';

	/**
	 * @param string $message
	 * @param string $type
	 * @param array  $meta
	 *
	 * @return void
	 */
	public function log( $message, $type = self::LEVEL_INFO, $meta = [] );

	/**
	 * @param string $message
<<<<<<< HEAD
	 * @param array  $meta
=======
	 * @param array $meta
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *
	 * @return void
	 */
	public function info( $message, $meta = [] );

	/**
	 * @param string $message
<<<<<<< HEAD
	 * @param array  $meta
=======
	 * @param array $meta
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *
	 * @return void
	 */
	public function notice( $message, $meta = [] );

	/**
	 * @param string $message
<<<<<<< HEAD
	 * @param array  $meta
=======
	 * @param array $meta
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *
	 * @return void
	 */
	public function warning( $message, $meta = [] );

	/**
	 * @param string $message
<<<<<<< HEAD
	 * @param array  $meta
=======
	 * @param array $meta
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *
	 * @return void
	 */
	public function error( $message, $meta = [] );

	/**
<<<<<<< HEAD
	 * @param int  $max_entries
	 * @param bool $table use <td> in format.
	 * @return array [ 'key' => [ 'total_count' => int, 'count' => int, 'entries' => Log_Item[] ] ]
	 */
	public function get_formatted_log_entries( $max_entries, $table = true );
=======
	 * @param int $max_entries
	 * @param bool $table use <td> in format
	 *
	 * @return array [ 'key' => [ 'total_count' => int, 'count' => int, 'entries' => Log_Item[] ] ]
	 */
	public function get_formatted_log_entries( $max_entries, $table = true );

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
