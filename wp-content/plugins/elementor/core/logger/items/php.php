<?php
namespace Elementor\Core\Logger\Items;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

class PHP extends File {

	const FORMAT = 'PHP: date [type X times][file::line] message [meta]';

	public function get_name() {
		return 'PHP';
	}
}
