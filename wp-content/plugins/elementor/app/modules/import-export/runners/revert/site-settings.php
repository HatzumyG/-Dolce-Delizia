<?php

namespace Elementor\App\Modules\ImportExport\Runners\Revert;

use Elementor\Plugin;

class Site_Settings extends Revert_Runner_Base {

<<<<<<< HEAD
	public static function get_name(): string {
		return 'site-settings';
	}

	public function should_revert( array $data ): bool {
=======
	public static function get_name() : string {
		return 'site-settings';
	}

	public function should_revert( array $data ) : bool {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return (
			isset( $data['runners'] ) &&
			array_key_exists( static::get_name(), $data['runners'] )
		);
	}

	public function revert( array $data ) {
		Plugin::$instance->kits_manager->revert(
			$data['runners'][ static::get_name() ]['imported_kit_id'],
			$data['runners'][ static::get_name() ]['active_kit_id'],
			$data['runners'][ static::get_name() ]['previous_kit_id']
		);
	}
}
