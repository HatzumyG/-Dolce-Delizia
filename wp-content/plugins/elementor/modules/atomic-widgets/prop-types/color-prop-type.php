<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes;

<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\String_Prop_Type;
=======
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Plain_Prop_Type;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

<<<<<<< HEAD
class Color_Prop_Type extends String_Prop_Type {
	public static function get_key(): string {
		return 'color';
	}
=======
class Color_Prop_Type extends Plain_Prop_Type {
	public static function get_key(): string {
		return 'color';
	}

	protected function validate_value( $value ): bool {
		return is_string( $value );
	}

	protected function sanitize_value( $value ) {
		return sanitize_text_field( $value );
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
