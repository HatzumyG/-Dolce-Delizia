<?php
namespace Elementor\Core\Experiments;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Non_Existing_Dependency {

	private $feature_id;

	public function __construct( $feature_id ) {
		$this->feature_id = $feature_id;
	}

	public function get_name() {
		return $this->feature_id;
	}

	public function get_title() {
		return $this->feature_id;
	}

	public function is_hidden() {
		return false;
	}

	public static function instance( $feature_id ) {
		return new static( $feature_id );
	}
}
