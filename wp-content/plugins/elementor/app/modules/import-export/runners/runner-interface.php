<?php

namespace Elementor\App\Modules\ImportExport\Runners;

use Elementor\App\Modules\ImportExport\Module;

interface Runner_Interface {

	const META_KEY_ELEMENTOR_IMPORT_SESSION_ID = Module::META_KEY_ELEMENTOR_IMPORT_SESSION_ID;

	const META_KEY_ELEMENTOR_EDIT_MODE = Module::META_KEY_ELEMENTOR_EDIT_MODE;

	/**
	 * Get the name of the runners, used to identify the runner.
	 * The name should be unique, unless you want to run over existing runner.
	 *
	 * @return string
	 */
<<<<<<< HEAD
	public static function get_name(): string;
=======
	public static function get_name() : string;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
