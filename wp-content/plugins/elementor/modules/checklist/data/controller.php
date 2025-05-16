<?php
namespace Elementor\Modules\Checklist\Data;

use Elementor\Data\V2\Base\Controller as Controller_Base;
use Elementor\Modules\Checklist\Data\Endpoints\Steps;
use Elementor\Modules\Checklist\Data\Endpoints\User_Progress;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Controller extends Controller_Base {
	public function get_name() {
		return 'checklist';
	}

	public function register_endpoints() {
		$this->index_endpoint->register_item_route();
		$this->register_endpoint( new Steps( $this ) );
		$this->register_endpoint( new User_Progress( $this ) );
	}

	public function update_items_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	public function update_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	public function get_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	public function get_items_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}
}
