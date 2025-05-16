<?php

namespace Elementor\App\Modules\ImportExport\Runners\Revert;

class Templates extends Revert_Runner_Base {
<<<<<<< HEAD
	/**
	 * The implement of this runner is part of the Pro plugin.
	 */
	public static function get_name(): string {
		return 'templates';
	}

	public function should_revert( array $data ): bool {
=======
	/*
	 * The implement of this runner is part of the Pro plugin.
	 */

	public static function get_name() : string {
		return 'templates';
	}

	public function should_revert( array $data ) : bool {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return false;
	}

	public function revert( array $data ) { }
}
