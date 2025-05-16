<?php

namespace Elementor\App\Modules\ImportExport\Compatibility;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class Kit_Library extends Base_Adapter {
	public static function is_compatibility_needed( array $manifest_data, array $meta ) {
		return ! empty( $meta['referrer'] ) && 'kit-library' === $meta['referrer'];
	}

	public function adapt_manifest( array $manifest_data ) {
		if ( ! empty( $manifest_data['content']['page'] ) ) {
			foreach ( $manifest_data['content']['page'] as & $page ) {
				$page['thumbnail'] = false;
			}
		}

		if ( ! empty( $manifest_data['templates'] ) ) {
			foreach ( $manifest_data['templates'] as & $template ) {
				$template['thumbnail'] = false;
			}
		}

		return $manifest_data;
	}
}
