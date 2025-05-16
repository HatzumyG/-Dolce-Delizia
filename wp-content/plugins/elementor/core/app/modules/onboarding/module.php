<?php
namespace Elementor\Core\App\Modules\Onboarding;

use Elementor\Core\Base\Module as BaseModule;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * This App class exists for backwards compatibility with 3rd parties.
 *
 * @deprecated 3.8.0
 */
class Module extends BaseModule {

	/**
	 * @deprecated 3.8.0
	 */
	const VERSION = '1.0.0';

	/**
	 * @deprecated 3.8.0
	 */
	public function get_name() {
		return 'onboarding-bc';
	}
}
