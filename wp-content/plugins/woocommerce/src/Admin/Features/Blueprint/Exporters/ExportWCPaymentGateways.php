<?php

declare( strict_types = 1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Admin\Features\Blueprint\Steps\SetWCPaymentGateways;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
<<<<<<< HEAD
use Automattic\WooCommerce\Blueprint\Steps\SetSiteOptions;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Automattic\WooCommerce\Blueprint\Steps\Step;

/**
 * ExportWCPaymentGateways class
 */
class ExportWCPaymentGateways implements StepExporter {
	/**
	 * Payment gateway IDs to exclude from export
	 *
	 * @var array|string[] Payment gateway IDs to exclude from export
	 */
	protected array $exclude_ids = array( 'pre_install_woocommerce_payments_promotion' );

	/**
	 * Export the step
	 *
	 * @return Step
	 */
	public function export(): Step {
<<<<<<< HEAD
		$options = array();
=======
		$step = new SetWCPaymentGateways();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$this->maybe_hide_wcpay_gateways();
		foreach ( $this->get_wc_payment_gateways() as $id => $payment_gateway ) {
			if ( in_array( $id, $this->exclude_ids, true ) ) {
				continue;
			}

<<<<<<< HEAD
			$options[ 'woocommerce_' . $id . '_settings' ] = $payment_gateway->settings;
		}

		return new SetSiteOptions( $options );
=======
			$step->add_payment_gateway(
				$id,
				$payment_gateway->get_title(),
				$payment_gateway->get_description(),
				$payment_gateway->is_available() ? 'yes' : 'no'
			);
		}

		return $step;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Return the payment gateways resgietered in WooCommerce
	 *
	 * @return string
	 */
	public function get_wc_payment_gateways() {
		return WC()->payment_gateways->payment_gateways();
	}

	/**
	 * Get the step name
	 *
	 * @return string
	 */
	public function get_step_name() {
<<<<<<< HEAD
		return 'wcPaymentGateways';
=======
		return SetWCPaymentGateways::get_step_name();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Maybe hide WooCommerce Payments gateways
	 *
	 * @return void
	 */
	protected function maybe_hide_wcpay_gateways() {
		if ( class_exists( 'WC_Payments' ) ) {
			\WC_Payments::hide_gateways_on_settings_page();
		}
	}

	/**
	 * Return label used in the frontend.
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Payments', 'woocommerce' );
	}

	/**
	 * Return description used in the frontend.
	 *
	 * @return string
	 */
	public function get_description() {
<<<<<<< HEAD
		return __( 'It includes all settings in WooCommerce | Settings | Payments.', 'woocommerce' );
=======
		return __( 'It includes payment gateways and their settings.', 'woocommerce' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
