<?php

namespace Elementor\Modules\SiteNavigation;

use Elementor\Core\Base\Module as Module_Base;
<<<<<<< HEAD
use Elementor\Core\Experiments\Exceptions\Dependency_Exception;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Core\Experiments\Manager as Experiments_Manager;
use Elementor\Modules\SiteNavigation\Data\Controller;
use Elementor\Modules\SiteNavigation\Rest_Fields\Page_User_Can;
use Elementor\Plugin;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Module extends Module_Base {
	const PAGES_PANEL_EXPERIMENT_NAME = 'pages_panel';

	/**
	 * Initialize the Site navigation module.
<<<<<<< HEAD
	 *
	 * @return void
	 * @throws \Exception If the experiment registration fails.
=======
	 * @return void
	 * @throws \Exception
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	public function __construct() {
		Plugin::$instance->data_manager_v2->register_controller( new Controller() );

		$is_tests = Utils::is_elementor_tests();
		$is_v2_experiment_on = Plugin::$instance->experiments->is_feature_active( 'editor_v2' );
		if ( ! $is_v2_experiment_on && ! $is_tests ) {
			return;
		}

		$this->register_pages_panel_experiment();

		if ( Plugin::$instance->experiments->is_feature_active( self::PAGES_PANEL_EXPERIMENT_NAME ) ) {
			add_filter( 'elementor/editor/v2/scripts/env', function( $env ) {
				$env['@elementor/editor-site-navigation'] = [
					'is_pages_panel_active' => true,
				];

				return $env;
			} );
			$this->register_rest_fields();
		}
	}

	/**
	 * Retrieve the module name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'site-navigation';
	}

	/**
	 * Register Experiment
	 *
	 * @since 3.16.0
	 *
	 * @return void
<<<<<<< HEAD
=======
	 * @throws \Exception
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	private function register_pages_panel_experiment() {
		Plugin::$instance->experiments->add_feature( [
			'name' => self::PAGES_PANEL_EXPERIMENT_NAME,
			'title' => esc_html__( 'Pages Panel', 'elementor' ),
			'release_status' => Experiments_Manager::RELEASE_STATUS_ALPHA,
			'default' => Experiments_Manager::STATE_INACTIVE,
			'hidden' => true,
			'dependencies' => [
				'editor_v2',
			],
		] );
	}

	private function register_rest_fields() {
		add_action( 'rest_api_init', function() {
			( new Page_User_Can() )->register_rest_field();
		} );
	}
<<<<<<< HEAD
=======

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
