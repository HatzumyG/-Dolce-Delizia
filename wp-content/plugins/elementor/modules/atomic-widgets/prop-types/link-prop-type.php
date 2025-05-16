<?php

namespace Elementor\Modules\AtomicWidgets\PropTypes;

<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Object_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\Boolean_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\Number_Prop_Type;
=======
use Elementor\Modules\AtomicWidgets\Image_Sizes;
use Elementor\Modules\AtomicWidgets\PropTypes\Base\Object_Prop_Type;
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\Boolean_Prop_Type;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Modules\AtomicWidgets\PropTypes\Primitives\String_Prop_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Link_Prop_Type extends Object_Prop_Type {
	public static function get_key(): string {
		return 'link';
	}

	protected function define_shape(): array {
		return [
<<<<<<< HEAD
			'destination' => Union_Prop_Type::make()
				->add_prop_type( Url_Prop_Type::make() )
				->add_prop_type( Number_Prop_Type::make() )
				->required(),
			'label' => Union_Prop_Type::make()
				->add_prop_type( String_Prop_Type::make() ),
=======
			'enabled' => Boolean_Prop_Type::make(),
			'href' => Url_Prop_Type::make(),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			'isTargetBlank' => Boolean_Prop_Type::make(),
		];
	}
}
