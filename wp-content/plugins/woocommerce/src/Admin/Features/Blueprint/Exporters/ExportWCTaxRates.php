<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Blueprint\Exporters\HasAlias;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
use Automattic\WooCommerce\Blueprint\Steps\RunSql;
use Automattic\WooCommerce\Blueprint\Util;
=======
declare( strict_types = 1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Admin\Features\Blueprint\Steps\SetWCTaxRates;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

/**
 * Class ExportWCTaxRates
 *
 * This class exports WooCommerce tax rates and implements the StepExporter interface.
 *
 * @package Automattic\WooCommerce\Admin\Features\Blueprint\Exporters
 */
<<<<<<< HEAD
class ExportWCTaxRates implements StepExporter, HasAlias {
=======
class ExportWCTaxRates implements StepExporter {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

	/**
	 * Export WooCommerce tax rates.
	 *
<<<<<<< HEAD
	 * @return array RunSql
	 */
	public function export(): array {
		return array_merge(
			$this->generateSteps( 'woocommerce_tax_rates' ),
			$this->generateSteps( 'woocommerce_tax_rate_locations' )
		);
	}

	/**
	 * Generate SQL steps for exporting data.
	 *
	 * @param string $table Table identifier.
	 * @return array Array of RunSql steps.
	 */
	private function generateSteps( string $table ): array {
		global $wpdb;
		$table = $wpdb->prefix . $table;
		return array_map(
			fn( $record ) => new RunSql( Util::array_to_insert_sql( $record, $table, 'replace into' ) ),
			// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$wpdb->get_results( "SELECT * FROM {$table}", ARRAY_A )
		);
=======
	 * @return SetWCTaxRates
	 */
	public function export() {
		global $wpdb;

		// Fetch tax rates from the database.
		$rates = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}woocommerce_tax_rates as tax_rates
            ",
			ARRAY_A
		);

		// Fetch tax rate locations from the database.
		$locations = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}woocommerce_tax_rate_locations as locations
            ",
			ARRAY_A
		);

		// Create a new SetWCTaxRates step with the fetched data.
		$step = new SetWCTaxRates( $rates, $locations );
		$step->set_meta_values(
			array(
				'plugin' => 'woocommerce',
			)
		);

		return $step;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Get the name of the step.
	 *
<<<<<<< HEAD
	 * @return string Step name.
	 */
	public function get_step_name(): string {
		return 'runSql';
=======
	 * @return string
	 */
	public function get_step_name() {
		return 'setWCTaxRates';
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Return label used in the frontend.
	 *
<<<<<<< HEAD
	 * @return string Label text.
	 */
	public function get_label(): string {
		return __( 'Tax', 'woocommerce' );
=======
	 * @return string
	 */
	public function get_label() {
		return __( 'Tax Rates', 'woocommerce' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Return description used in the frontend.
	 *
<<<<<<< HEAD
	 * @return string Description text.
	 */
	public function get_description(): string {
		return __( 'It includes all settings in WooCommerce | Settings | Tax.', 'woocommerce' );
	}

	/**
	 * Get the alias.
	 *
	 * @return string Alias name.
	 */
	public function get_alias(): string {
		return 'setWCTaxRates';
=======
	 * @return string
	 */
	public function get_description() {
		return __( 'It includes tax rates and locations.', 'woocommerce' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
