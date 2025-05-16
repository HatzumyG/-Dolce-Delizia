<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Blueprint\Exporters\HasAlias;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
use Automattic\WooCommerce\Blueprint\Steps\RunSql;
use Automattic\WooCommerce\Blueprint\Steps\SetSiteOptions;
=======
declare( strict_types = 1);

namespace Automattic\WooCommerce\Admin\Features\Blueprint\Exporters;

use Automattic\WooCommerce\Admin\Features\Blueprint\Steps\SetWCShipping;
use Automattic\WooCommerce\Blueprint\Exporters\StepExporter;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Automattic\WooCommerce\Blueprint\Util;

/**
 * Class ExportWCShipping
 *
<<<<<<< HEAD
 * Exports WooCommerce shipping settings and implements the StepExporter interface.
 *
 * @package Automattic\WooCommerce\Admin\Features\Blueprint\Exporters
 */
class ExportWCShipping implements StepExporter, HasAlias {
	/**
	 * Export WooCommerce shipping settings.
	 *
	 * @return array Array of RunSql|SetSiteOptions instances.
	 */
	public function export(): array {
		$steps = array_merge(
			array(),
			$this->get_steps_for_classes_and_terms(),
			$this->get_steps_for_zones(),
			$this->get_steps_for_locations(),
			$this->get_steps_for_methods_and_options()
		);

		$steps[] = $this->get_step_for_local_pickup();
		return $steps;
	}

	/**
	 * Retrieve term data based on provided classes.
	 *
	 * @param array $classes List of classes with term IDs.
	 * @return array Retrieved term data.
	 */
	protected function get_terms( array $classes ): array {
		global $wpdb;

		$term_ids = array_map( fn( $term ) => (int) $term['term_id'], $classes );
		$term_ids = implode( ', ', $term_ids );

		return ! empty( $term_ids ) ? $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}terms WHERE term_id IN (%s)",
				$term_ids
			),
			ARRAY_A
		) : array();
	}

	/**
	 * Retrieve shipping classes and related terms.
	 *
	 * @return array Steps for shipping classes and terms.
	 */
	protected function get_steps_for_classes_and_terms(): array {
		global $wpdb;

		$classes = $wpdb->get_results(
			"SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE taxonomy = 'product_shipping_class'",
			ARRAY_A
		);

		$classes_steps = array_map(
			fn( $class_row ) => new RunSql( Util::array_to_insert_sql( $class_row, $wpdb->prefix . 'term_taxonomy', 'replace into' ) ),
			$classes
		);

		$terms = array_map(
			fn( $term ) => new RunSql( Util::array_to_insert_sql( $term, $wpdb->prefix . 'terms', 'replace into' ) ),
			$this->get_terms( $classes )
		);

		return array_merge( $classes_steps, $terms );
=======
 * This class exports WooCommerce shipping settings and implements the StepExporter interface.
 *
 * @package Automattic\WooCommerce\Admin\Features\Blueprint\Exporters
 */
class ExportWCShipping implements StepExporter {
	/**
	 * Export WooCommerce shipping settings.
	 *
	 * @return SetWCShipping
	 */
	public function export() {
		global $wpdb;

		// Fetch shipping classes from the database.
		$classes = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}term_taxonomy
            WHERE taxonomy = 'product_shipping_class'
        "
		);

		$term_ids = array();

		// Collect term IDs.
		foreach ( $classes as $term ) {
			$term_ids[] = (int) $term->term_id;
		}

		$term_ids = implode( ', ', $term_ids );

		// Fetch terms based on term IDs.
		if ( ! empty( $term_ids ) ) {
			$terms = $wpdb->get_results(
				$wpdb->prepare(
					"
                SELECT *
                FROM {$wpdb->prefix}terms
                WHERE term_id IN (%s)
      	  		",
					$term_ids
				)
			);
		} else {
			$terms = array();
		}

		// Fetch local pickup settings.
		$local_pickup = array(
			'general'   => get_option( 'woocommerce_pickup_location_settings', array() ),
			'locations' => get_option( 'pickup_location_pickup_locations', array() ),
		);

		if ( empty( $local_pickup['general'] ) ) {
			$local_pickup['general'] = new \stdClass();
		}

		// Fetch shipping zones from the database.
		$zones = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}woocommerce_shipping_zones
        "
		);

		// Fetch shipping zone methods from the database.
		$methods = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}woocommerce_shipping_zone_methods
        "
		);

		// Fetch shipping method options.
		// Each method has a corresponding option in the options table.
		$method_options = $wpdb->get_results(
			"
			SELECT *
			FROM {$wpdb->prefix}options
			WHERE option_name LIKE 'woocommerce_flat_rate_%_settings'
			or option_name LIKE 'woocommerce_free_shipping_%_settings'
		",
			ARRAY_A
		);

		$method_options = Util::index_array(
			$method_options,
			function ( $key, $option ) {
				return $option['option_name'];
			}
		);

		foreach ( $methods as $method ) {
			$key_name = 'woocommerce_' . $method->method_id . '_' . $method->instance_id . '_settings';
			if ( isset( $method_options[ $key_name ] ) ) {
				$method->settings = array(
					'option_name'  => $key_name,
					'option_value' => maybe_unserialize( $method_options[ $key_name ]['option_value'] ),
				);
			}
		}

		$methods_by_zone_id = array();

		// Organize methods by zone ID.
		foreach ( $methods as $method ) {
			if ( ! isset( $methods_by_zone_id[ $method->zone_id ] ) ) {
				$methods_by_zone_id[ $method->zone_id ] = array();
			}
			$methods_by_zone_id[ $method->zone_id ][] = $method->method_id;
		}

		// Fetch shipping zone locations from the database.
		$locations = $wpdb->get_results(
			"
            SELECT *
            FROM {$wpdb->prefix}woocommerce_shipping_zone_locations
        "
		);

		$locations_by_zone_id = array();

		// Organize locations by zone ID.
		foreach ( $locations as $location ) {
			if ( ! isset( $locations_by_zone_id[ $location->zone_id ] ) ) {
				$locations_by_zone_id[ $location->zone_id ] = array();
			}
			$locations_by_zone_id[ $location->zone_id ][] = $location->location_id;
		}

		// Create a new SetWCShipping step with the fetched data.
		$step = new SetWCShipping( $methods, $locations, $zones, $terms, $classes, $local_pickup );
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
	 * @return string
	 */
<<<<<<< HEAD
	public function get_step_name(): string {
		return RunSql::get_step_name();
=======
	public function get_step_name() {
		return SetWCShipping::get_step_name();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Return label used in the frontend.
	 *
	 * @return string
	 */
<<<<<<< HEAD
	public function get_label(): string {
=======
	public function get_label() {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return __( 'Shipping', 'woocommerce' );
	}

	/**
	 * Return description used in the frontend.
	 *
	 * @return string
	 */
<<<<<<< HEAD
	public function get_description(): string {
		return __( 'It includes all settings in WooCommerce | Settings | Shipping.', 'woocommerce' );
	}

	/**
	 * Get the alias.
	 *
	 * @return string
	 */
	public function get_alias(): string {
		return 'setWCShipping';
	}

	/**
	 * Retrieve shipping zones from the database.
	 *
	 * @return array Steps for shipping zones.
	 */
	private function get_steps_for_zones(): array {
		global $wpdb;

		return array_map(
			fn( $zone ) => new RunSql( Util::array_to_insert_sql( $zone, $wpdb->prefix . 'woocommerce_shipping_zones', 'replace into' ) ),
			$wpdb->get_results( "SELECT * FROM {$wpdb->prefix}woocommerce_shipping_zones", ARRAY_A )
		);
	}

	/**
	 * Retrieve shipping zone locations.
	 *
	 * @return array Steps for shipping zone locations.
	 */
	private function get_steps_for_locations(): array {
		global $wpdb;

		return array_map(
			fn( $location ) => new RunSql( Util::array_to_insert_sql( $location, $wpdb->prefix . 'woocommerce_shipping_zone_locations', 'replace into' ) ),
			$wpdb->get_results( "SELECT * FROM {$wpdb->prefix}woocommerce_shipping_zone_locations", ARRAY_A )
		);
	}

	/**
	 * Retrieve shipping methods and options.
	 *
	 * @return array Steps for shipping methods and options.
	 */
	private function get_steps_for_methods_and_options(): array {
		global $wpdb;

		$methods        = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}woocommerce_shipping_zone_methods", ARRAY_A );
		$method_options = $wpdb->get_results(
			"SELECT * FROM {$wpdb->prefix}options WHERE option_name LIKE 'woocommerce_flat_rate_%_settings' 
            OR option_name LIKE 'woocommerce_free_shipping_%_settings'",
			ARRAY_A
		);

		return array_merge(
			array_map(
				fn( $method ) => new RunSql( Util::array_to_insert_sql( $method, $wpdb->prefix . 'woocommerce_shipping_zone_methods', 'replace into' ) ),
				$methods
			),
			array_map(
				fn( $option ) => new RunSql( Util::array_to_insert_sql( $option, $wpdb->prefix . 'options', 'replace into' ) ),
				$method_options
			)
		);
	}

	/**
	 * Retrieve local pickup settings.
	 *
	 * @return SetSiteOptions Local pickup settings step.
	 */
	private function get_step_for_local_pickup(): SetSiteOptions {
		return new SetSiteOptions(
			array(
				'woocommerce_pickup_location_settings' => get_option( 'woocommerce_pickup_location_settings', array() ),
				'pickup_location_pickup_locations'     => get_option( 'pickup_location_pickup_locations', array() ),
			)
		);
=======
	public function get_description() {
		return __( 'It includes shipping settings', 'woocommerce' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
