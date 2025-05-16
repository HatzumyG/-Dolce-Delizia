<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes;

<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Plain_Prop_Type;
=======
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Object_Prop_Type;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\Number_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\String_Prop_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

<<<<<<< HEAD
class Size_Prop_Type extends Plain_Prop_Type {
=======
class Size_Prop_Type extends Object_Prop_Type {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	const SUPPORTED_UNITS = [ 'px', 'em', 'rem', '%', 'vh', 'vw', 'vmin', 'vmax' ];

	public static function get_key(): string {
		return 'size';
	}

<<<<<<< HEAD
	protected function validate_value( $value ): bool {
		return (
			is_array( $value ) &&
			array_key_exists( 'size', $value ) &&
			is_numeric( $value['size'] ) &&
			! empty( $value['unit'] ) &&
			in_array( $value['unit'], static::SUPPORTED_UNITS, true )
		);
	}

	protected function sanitize_value( $value ) {
		return [
			'size' => (int) $value['size'],
			'unit' => sanitize_text_field( $value['unit'] ),
=======
	protected function define_shape(): array {
		return [
			'size' => Number_Prop_Type::make()->required(),
			'unit' => String_Prop_Type::make()->enum( static::SUPPORTED_UNITS )->required(),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		];
	}
}
