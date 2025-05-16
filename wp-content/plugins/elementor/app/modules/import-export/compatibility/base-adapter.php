<?php

namespace Elementor\App\Modules\ImportExport\Compatibility;

use Elementor\App\Modules\ImportExport\Import;
use Elementor\Core\Base\Base_Object;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

abstract class Base_Adapter {

	/**
	 * @param array $manifest_data
	 * @param array $meta
	 * @return false
	 */
	public static function is_compatibility_needed( array $manifest_data, array $meta ) {
		return false;
	}

	public function adapt_manifest( array $manifest_data ) {
		return $manifest_data;
	}

	public function adapt_site_settings( array $site_settings, array $manifest_data, $path ) {
		return $site_settings;
	}

	public function adapt_template( array $template_data, array $template_settings ) {
		return $template_data;
	}
}
