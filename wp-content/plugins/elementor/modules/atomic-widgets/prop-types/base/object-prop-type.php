<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes\Base;

use Elementor\Modules\AtomicWidgets\PropTypes\Concerns;
use Elementor\Modules\AtomicWidgets\PropTypes\Contracts\Transformable_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Contracts\Prop_Type;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

abstract class Object_Prop_Type implements Transformable_Prop_Type {
	const KIND = 'object';

<<<<<<< HEAD
	use Concerns\Has_Default;
	use Concerns\Has_Generate;
	use Concerns\Has_Meta;
	use Concerns\Has_Required_Setting;
	use Concerns\Has_Settings;
	use Concerns\Has_Transformable_Validation;
=======
	use Concerns\Has_Default,
		Concerns\Has_Generate,
		Concerns\Has_Meta,
		Concerns\Has_Required_Setting,
		Concerns\Has_Settings,
		Concerns\Has_Transformable_Validation;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

	/**
	 * @var array<Prop_Type>
	 */
	protected array $shape;

	public function __construct() {
		$this->shape = $this->define_shape();
	}

<<<<<<< HEAD
	public function get_default() {
		if ( null !== $this->default ) {
			return $this->default;
		}

		foreach ( $this->get_shape() as $item ) {
			// If the object has at least one property with default, return an empty object so
			// it'll be iterable for processes like validation / transformation.
			if ( $item->get_default() !== null ) {
				return static::generate( [] );
			}
		}

		return null;
	}

=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	/**
	 * @return static
	 */
	public static function make() {
		return new static();
	}

	/**
	 * @param array $shape
	 *
	 * @return $this
	 */
	public function set_shape( array $shape ) {
		$this->shape = $shape;

		return $this;
	}

	public function get_shape(): array {
		return $this->shape;
	}

	public function get_shape_field( $key ): ?Prop_Type {
		return $this->shape[ $key ] ?? null;
	}

	public function validate( $value ): bool {
		if ( is_null( $value ) ) {
			return ! $this->is_required();
		}

		return (
			$this->is_transformable( $value ) &&
			$this->validate_value( $value['value'] )
		);
	}

	protected function validate_value( $value ): bool {
		if ( ! is_array( $value ) ) {
			return false;
		}

		foreach ( $this->get_shape() as $key => $prop_type ) {
			if ( ! ( $prop_type instanceof Prop_Type ) ) {
				Utils::safe_throw( "Object prop type must have a prop type for key: $key" );
			}

<<<<<<< HEAD
			if ( ! $prop_type->validate( $value[ $key ] ?? $prop_type->get_default() ) ) {
=======
			if ( ! $prop_type->validate( $value[ $key ] ?? null ) ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
				return false;
			}
		}

		return true;
	}

	public function sanitize( $value ) {
		$value['value'] = $this->sanitize_value( $value['value'] );

		return $value;
	}

	public function sanitize_value( $value ) {
		foreach ( $this->get_shape() as $key => $prop_type ) {
			if ( ! isset( $value[ $key ] ) ) {
				continue;
			}

			$sanitized_value = $prop_type->sanitize( $value[ $key ] );

			$value[ $key ] = $sanitized_value;
		}

		return $value;
	}

	public function jsonSerialize(): array {
<<<<<<< HEAD
		$default = $this->get_default();

		return [
			'kind' => static::KIND,
			'key' => static::get_key(),
			'default' => is_array( $default ) ? (object) $default : $default,
			'meta' => (object) $this->get_meta(),
			'settings' => (object) $this->get_settings(),
			'shape' => (object) $this->get_shape(),
=======
		return [
			'kind' => static::KIND,
			'key' => static::get_key(),
			'default' => $this->get_default(),
			'meta' => $this->get_meta(),
			'settings' => $this->get_settings(),
			'shape' => $this->get_shape(),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		];
	}

	/**
	 * @return array<Prop_Type>
	 */
	abstract protected function define_shape(): array;
}
