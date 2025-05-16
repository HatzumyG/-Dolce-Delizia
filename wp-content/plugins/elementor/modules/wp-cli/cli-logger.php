<?php
namespace Elementor\Modules\WpCli;

use Elementor\Core\Logger\Loggers\Db;
<<<<<<< HEAD
use Elementor\Core\Logger\Items\Log_Item_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
=======
use Elementor\Core\Logger\Items\Log_Item_Interface as Log_Item_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Cli_Logger extends Db {

	public function save_log( Log_Item_Interface $item ) {
		$message = $item->format( 'raw' );
		switch ( $item->type ) {
			case self::LEVEL_WARNING:
				\WP_CLI::warning( $message );
				break;
			case self::LEVEL_ERROR:
				\WP_CLI::error( $message, false );
				break;
			default:
				\WP_CLI::log( $message );
				break;
		}

		parent::save_log( $item );
	}
}
