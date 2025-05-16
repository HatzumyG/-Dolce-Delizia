<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes\Primitives;

use Elementor\Modules\AtomicWidgets\PropTypes\Base\Plain_Prop_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Boolean_Prop_Type extends Plain_Prop_Type {
<<<<<<< HEAD
=======
	use Supports_Shorthanded_Value;

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	public static function get_key(): string {
		return 'boolean';
	}

	protected function validate_value( $value ): bool {
		return is_bool( $value );
	}

	protected function sanitize_value( $value ) {
		return (bool) $value;
	}
}
