<?php
namespace Elementor\Core\Experiments;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Wrap_Core_Dependency {

	private $feature_data;

	public function __construct( $feature_data ) {
		$this->feature_data = $feature_data;
	}

	public function get_name() {
		return $this->feature_data['name'];
	}

	public function get_title() {
		return $this->feature_data['title'];
	}

	public function is_hidden() {
		return $this->feature_data['hidden'];
	}

	public static function instance( $feature_data ) {
		return new static( $feature_data );
	}
}
