<?php

namespace Elementor\Modules\Promotions\AdminMenuItems\Interfaces;

use Elementor\Core\Admin\Menu\Interfaces\Admin_Menu_Item_With_Page;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

interface Promotion_Menu_Item extends Admin_Menu_Item_With_Page {
	public function get_image_url();

	public function get_promotion_title();

	public function get_promotion_description();

	public function get_cta_text();

	public function get_cta_url();
}
