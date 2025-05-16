<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes;

<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Plain_Prop_Type;
=======
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Array_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Contracts\Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\String_Prop_Type;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

<<<<<<< HEAD
class Classes_Prop_Type extends Plain_Prop_Type {
=======
class Classes_Prop_Type extends Array_Prop_Type {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	public static function get_key(): string {
		return 'classes';
	}

<<<<<<< HEAD
	protected function validate_value( $value ): bool {
		if ( ! is_array( $value ) ) {
			return false;
		}

		foreach ( $value as $class_name ) {
			if ( ! is_string( $class_name ) || ! preg_match( '/^[a-z][a-z-_0-9]*$/i', $class_name ) ) {
				return false;
			}
		}

		return true;
	}

	protected function sanitize_value( $value ) {
		if ( ! is_array( $value ) ) {
			return null;
		}

		$sanitized = array_map(function ( $class_name ) {
			if ( ! is_string( $class_name ) ) {
				return null;
			}
			return sanitize_text_field( $class_name );
		}, $value);

		return array_filter($sanitized, function ( $class_name ) {
			return ! empty( $class_name );
		});
=======
	public function define_item_type(): Prop_Type {
		return String_Prop_Type::make()->regex( '/^[a-z][a-z-_0-9]*$/i' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
