<?php

namespace Elementor\Modules\AtomicWidgets\PropsResolver\Transformers;

use Elementor\Modules\AtomicWidgets\PropsResolver\Transformer_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Combine_Array_Transformer extends Transformer_Base {
	private string $separator;

	public function __construct( string $separator ) {
		$this->separator = $separator;
	}

	public function transform( $value, $key ) {
<<<<<<< HEAD
		if ( ! is_array( $value ) ) {
			return null;
		}

=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return implode( $this->separator, array_filter( $value ) );
	}
}
