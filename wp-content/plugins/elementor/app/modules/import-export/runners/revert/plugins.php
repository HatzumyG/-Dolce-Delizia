<?php

namespace Elementor\App\Modules\ImportExport\Runners\Revert;

class Plugins extends Revert_Runner_Base {

<<<<<<< HEAD
	public static function get_name(): string {
		return 'plugins';
	}

	public function should_revert( array $data ): bool {
=======
	public static function get_name() : string {
		return 'plugins';
	}

	public function should_revert( array $data ) : bool {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return false;
	}

	public function revert( array $data ) {}
}
