<?php
namespace Elementor\Modules\AtomicWidgets\Controls\Types;

use Elementor\Modules\AtomicWidgets\Base\Atomic_Control_Base;
<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\Image\Image_Sizes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
=======
use Elementor\Modules\AtomicWidgets\Image_Sizes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Image_Control extends Atomic_Control_Base {

	public function get_type(): string {
		return 'image';
	}

	public function get_props(): array {
		return [
			'sizes' => Image_Sizes::get_all(),
		];
	}
}
