<?php
/**
 * Enables WooCommerce, via the command line.
 *
 * @package WooCommerce\CLI
 * @version 3.0.0
 */

use Automattic\WooCommerce\Database\Migrations\CustomOrderTable\CLIRunner as CustomOrdersTableCLIRunner;
use Automattic\WooCommerce\Internal\ProductAttributesLookup\CLIRunner as ProductAttributesLookupCLIRunner;
<<<<<<< HEAD
use Automattic\WooCommerce\Utilities\FeaturesUtil;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

defined( 'ABSPATH' ) || exit;

/**
 * CLI class.
 */
class WC_CLI {
	/**
	 * Load required files and hooks to make the CLI work.
	 */
	public function __construct() {
		$this->includes();
		$this->hooks();
	}

	/**
	 * Load command files.
	 */
	private function includes() {
		require_once __DIR__ . '/cli/class-wc-cli-runner.php';
		require_once __DIR__ . '/cli/class-wc-cli-rest-command.php';
		require_once __DIR__ . '/cli/class-wc-cli-tool-command.php';
		require_once __DIR__ . '/cli/class-wc-cli-update-command.php';
		require_once __DIR__ . '/cli/class-wc-cli-tracker-command.php';
		require_once __DIR__ . '/cli/class-wc-cli-com-command.php';
		require_once __DIR__ . '/cli/class-wc-cli-com-extension-command.php';
		$this->maybe_include_blueprint_cli();
	}

	/**
	 * Sets up and hooks WP CLI to our CLI code.
	 */
	private function hooks() {
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_Runner::after_wp_load' );
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_Tool_Command::register_commands' );
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_Update_Command::register_commands' );
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_Tracker_Command::register_commands' );
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_COM_Command::register_commands' );
		WP_CLI::add_hook( 'after_wp_load', 'WC_CLI_COM_Extension_Command::register_commands' );
		$cli_runner = wc_get_container()->get( CustomOrdersTableCLIRunner::class );
		WP_CLI::add_hook( 'after_wp_load', array( $cli_runner, 'register_commands' ) );
		$cli_runner = wc_get_container()->get( ProductAttributesLookupCLIRunner::class );
		WP_CLI::add_hook( 'after_wp_load', fn() => \WP_CLI::add_command( 'wc palt', $cli_runner ) );

<<<<<<< HEAD
		if ( FeaturesUtil::feature_is_enabled( 'blueprint' ) && class_exists( \Automattic\WooCommerce\Blueprint\Cli::class ) ) {
=======
		if ( class_exists( \Automattic\WooCommerce\Blueprint\Cli::class ) ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			WP_CLI::add_hook( 'after_wp_load', 'Automattic\WooCommerce\Blueprint\Cli::register_commands' );
		}
	}

	/**
	 * Include Blueprint CLI if it's available.
	 */
	private function maybe_include_blueprint_cli() {
<<<<<<< HEAD
		if ( FeaturesUtil::feature_is_enabled( 'blueprint' ) ) {
=======
		if ( ! function_exists( 'wc_admin_get_feature_config' ) ) {
			require_once WC_ABSPATH . 'includes/react-admin/feature-config.php';
		}

		$features = wc_admin_get_feature_config();
		if ( isset( $features['blueprint'] ) ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			require_once dirname( WC_PLUGIN_FILE ) . '/vendor/woocommerce/blueprint/src/Cli.php';
		}
	}
}

new WC_CLI();
