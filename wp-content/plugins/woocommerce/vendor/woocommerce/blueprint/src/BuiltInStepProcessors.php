<?php

namespace Automattic\WooCommerce\Blueprint;

use Automattic\WooCommerce\Blueprint\Importers\ImportActivatePlugin;
use Automattic\WooCommerce\Blueprint\Importers\ImportActivateTheme;
use Automattic\WooCommerce\Blueprint\Importers\ImportDeactivatePlugin;
use Automattic\WooCommerce\Blueprint\Importers\ImportDeletePlugin;
use Automattic\WooCommerce\Blueprint\Importers\ImportInstallPlugin;
use Automattic\WooCommerce\Blueprint\Importers\ImportInstallTheme;
<<<<<<< HEAD
use Automattic\WooCommerce\Blueprint\Importers\ImportRunSql;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Automattic\WooCommerce\Blueprint\Importers\ImportSetSiteOptions;
use Automattic\WooCommerce\Blueprint\ResourceStorages\LocalPluginResourceStorage;
use Automattic\WooCommerce\Blueprint\ResourceStorages\LocalThemeResourceStorage;
use Automattic\WooCommerce\Blueprint\ResourceStorages\OrgPluginResourceStorage;
use Automattic\WooCommerce\Blueprint\ResourceStorages\OrgThemeResourceStorage;
use Automattic\WooCommerce\Blueprint\Schemas\JsonSchema;
use Automattic\WooCommerce\Blueprint\Schemas\ZipSchema;

/**
 * Class BuiltInStepProcessors
 *
 * @package Automattic\WooCommerce\Blueprint
 */
class BuiltInStepProcessors {
	/**
<<<<<<< HEAD
	 * BuiltInStepProcessors constructor.
	 */
	public function __construct() {
=======
	 * The schema used for validation and processing.
	 *
	 * @var JsonSchema The schema used for validation and processing.
	 */
	private JsonSchema $schema;

	/**
	 * BuiltInStepProcessors constructor.
	 *
	 * @param JsonSchema $schema The schema used for validation and processing.
	 */
	public function __construct( JsonSchema $schema ) {
		$this->schema = $schema;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Returns an array of all step processors.
	 *
	 * @return array The array of step processors.
	 */
	public function get_all() {
		return array(
			$this->create_install_plugins_processor(),
			$this->create_install_themes_processor(),
			new ImportSetSiteOptions(),
			new ImportDeletePlugin(),
			new ImportActivatePlugin(),
			new ImportActivateTheme(),
			new ImportDeactivatePlugin(),
<<<<<<< HEAD
			new ImportRunSql(),
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		);
	}

	/**
	 * Creates the processor for installing plugins.
	 *
	 * @return ImportInstallPlugin The processor for installing plugins.
	 */
	private function create_install_plugins_processor() {
		$storages = new ResourceStorages();
		$storages->add_storage( new OrgPluginResourceStorage() );
<<<<<<< HEAD
=======

		if ( $this->schema instanceof ZipSchema ) {
			$storages->add_storage( new LocalPluginResourceStorage( $this->schema->get_unzipped_path() ) );
		}

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return new ImportInstallPlugin( $storages );
	}

	/**
	 * Creates the processor for installing themes.
	 *
	 * @return ImportInstallTheme The processor for installing themes.
	 */
	private function create_install_themes_processor() {
		$storage = new ResourceStorages();
		$storage->add_storage( new OrgThemeResourceStorage() );
<<<<<<< HEAD
=======
		if ( $this->schema instanceof ZipSchema ) {
			$storage->add_storage( new LocalThemeResourceStorage( $this->schema->get_unzipped_path() ) );
		}

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return new ImportInstallTheme( $storage );
	}
}
