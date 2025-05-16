<?php

namespace Elementor\App\Modules\ImportExport\Runners\Export;

class Plugins extends Export_Runner_Base {

<<<<<<< HEAD
	public static function get_name(): string {
=======
	public static function get_name() : string {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return 'plugins';
	}

	public function should_export( array $data ) {
		return (
			isset( $data['include'] ) &&
			in_array( 'plugins', $data['include'], true ) &&
			is_array( $data['selected_plugins'] )
		);
	}

	public function export( array $data ) {
		$manifest_data['plugins'] = $data['selected_plugins'];

		return [
			'manifest' => [
				$manifest_data,
			],
			'files' => [],
		];
	}
}
