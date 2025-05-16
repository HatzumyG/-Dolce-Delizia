<?php

declare( strict_types = 1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Blueprint\Exporters\ExportsStep;
use Automattic\WooCommerce\Blueprint\Exporters\HasAlias;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
use Automattic\WooCommerce\Blueprint\Steps\SetSiteOptions;
use Automattic\WooCommerce\Blueprint\UseWPFunctions;

/**
 * Class ExportWCTaskOptions
 *
 * This class exports WooCommerce task options and implements the StepExporter and HasAlias interfaces.
 *
 * @package Automattic\WooCommerce\Admin\Features\Blueprint\Exporters
 */
class ExportWCTaskOptions implements StepExporter, HasAlias {
	use UseWPFunctions;

	/**
	 * Export WooCommerce task options.
	 *
	 * @return SetSiteOptions
	 */
	public function export() {
<<<<<<< HEAD
		return new SetSiteOptions(
=======
		$step = new SetSiteOptions(
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			array(
				'woocommerce_admin_customize_store_completed' => $this->wp_get_option( 'woocommerce_admin_customize_store_completed', 'no' ),
				'woocommerce_task_list_tracked_completed_actions' => $this->wp_get_option( 'woocommerce_task_list_tracked_completed_actions', array() ),
			)
		);
<<<<<<< HEAD
=======

		$step->set_meta_values(
			array(
				'plugin' => 'woocommerce',
				'alias'  => $this->get_alias(),
			)
		);

		return $step;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Get the name of the step.
	 *
	 * @return string
	 */
	public function get_step_name() {
		return 'setOptions';
	}

	/**
	 * Get the alias for this exporter.
	 *
	 * @return string
	 */
	public function get_alias() {
		return 'setWCTaskOptions';
	}

	/**
	 * Return label used in the frontend.
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Task Configurations', 'woocommerce' );
	}

	/**
	 * Return description used in the frontend.
	 *
	 * @return string
	 */
	public function get_description() {
		return __( 'It includes the task configurations for WooCommerce.', 'woocommerce' );
	}
}
