<?php

namespace Elementor\App\Modules\ImportExport\Runners\Revert;

use Elementor\App\Modules\ImportExport\Runners\Runner_Interface;

abstract class Revert_Runner_Base implements Runner_Interface {

	/**
	 * By the passed data we should decide if we want to run the revert function of the runner or not.
	 *
	 * @param array $data
	 *
	 * @return bool
	 */
<<<<<<< HEAD
	abstract public function should_revert( array $data ): bool;
=======
	abstract public function should_revert( array $data ) : bool;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

	/**
	 * Main function of the runner revert process.
	 *
	 * @param array $data Necessary data for the revert process.
	 */
	abstract public function revert( array $data );
}
