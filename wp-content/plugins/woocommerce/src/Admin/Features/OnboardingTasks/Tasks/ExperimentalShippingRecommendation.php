<?php

namespace Automattic\WooCommerce\Admin\Features\OnboardingTasks\Tasks;

use Automattic\Jetpack\Connection\Manager;
use Automattic\WooCommerce\Admin\Features\Features;
use Automattic\WooCommerce\Admin\Features\OnboardingTasks\Task;
use Automattic\WooCommerce\Admin\PluginsHelper;

/**
 * Shipping Task
 */
class ExperimentalShippingRecommendation extends Task {
	/**
	 * ID.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'shipping-recommendation';
	}

	/**
	 * Title.
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Get your products shipped', 'woocommerce' );
	}

	/**
	 * Content.
	 *
	 * @return string
	 */
	public function get_content() {
		return '';
	}

	/**
	 * Time.
	 *
	 * @return string
	 */
	public function get_time() {
		return '';
	}

	/**
	 * Task completion.
	 *
	 * @return bool
	 */
	public function is_complete() {
		return self::has_plugins_active() && self::has_jetpack_connected();
	}

	/**
	 * Task visibility.
	 *
	 * @return bool
	 */
	public function can_view() {
<<<<<<< HEAD
		return Features::is_enabled( 'shipping-smart-defaults' );
=======
		return Features::is_enabled( 'shipping-smart-defaults' ) &&
			! PluginsHelper::is_plugin_active( 'woocommerce-shipping' ) &&
			! PluginsHelper::is_plugin_active( 'woocommerce-tax' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Action URL.
	 *
	 * @return string
	 */
	public function get_action_url() {
		return '';
	}

	/**
	 * Check if the store has any shipping zones.
	 *
	 * @return bool
	 */
	public static function has_plugins_active() {
<<<<<<< HEAD
		return PluginsHelper::is_plugin_active( 'woocommerce-shipping' );
=======
		return PluginsHelper::is_plugin_active( 'woocommerce-services' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Check if the Jetpack is connected.
	 *
	 * @return bool
	 */
	public static function has_jetpack_connected() {
		$jetpack_connection_manager = new Manager( 'woocommerce' );

		return $jetpack_connection_manager->is_connected() && $jetpack_connection_manager->has_connected_owner();
	}
}
