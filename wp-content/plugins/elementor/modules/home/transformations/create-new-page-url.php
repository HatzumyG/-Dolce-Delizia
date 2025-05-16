<?php
namespace Elementor\Modules\Home\Transformations;

use Elementor\Modules\Home\Transformations\Base\Transformations_Abstract;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Create_New_Page_Url extends Transformations_Abstract {

	public function transform( array $home_screen_data ): array {
<<<<<<< HEAD
		$home_screen_data['button_cta_url'] = Plugin::$instance->documents->get_create_new_post_url( 'page' );
=======
		$home_screen_data['create_new_page_url'] = Plugin::$instance->documents->get_create_new_post_url( 'page' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

		return $home_screen_data;
	}
}
