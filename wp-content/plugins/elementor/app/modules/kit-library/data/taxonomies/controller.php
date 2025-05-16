<?php
namespace Elementor\App\Modules\KitLibrary\Data\Taxonomies;

use Elementor\App\Modules\KitLibrary\Data\Base_Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Controller extends Base_Controller {

	public function get_name() {
		return 'kit-taxonomies';
	}

	public function get_collection_params() {
		return [
			'force' => [
				'description' => 'Force an API request and skip the cache.',
				'required' => false,
				'default' => false,
				'type' => 'boolean',
			],
		];
	}

	public function get_items( $request ) {
		$data = $this->get_repository()->get_taxonomies( $request->get_param( 'force' ) );

		return [
			'data' => $data->values(),
		];
	}

	public function get_permission_callback( $request ) {
<<<<<<< HEAD
		return current_user_can( 'manage_options' );
=======
		return current_user_can( 'administrator' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
