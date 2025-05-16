<?php

namespace Elementor\Modules\AtomicWidgets\DynamicTags;

<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropsResolver\Props_Resolver;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Modules\AtomicWidgets\PropsResolver\Transformers_Registry;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Dynamic_Tags_Module {

	private static ?self $instance = null;

<<<<<<< HEAD
	public Dynamic_Tags_Editor_Config $registry;

	private Dynamic_Tags_Schemas $schemas;

	private function __construct() {
		$this->schemas = new Dynamic_Tags_Schemas();
		$this->registry = new Dynamic_Tags_Editor_Config( $this->schemas );
=======
	public Dynamic_Tags_Registry $registry;

	private function __construct() {
		$this->registry = new Dynamic_Tags_Registry();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	public static function instance( $fresh = false ): self {
		if ( null === static::$instance || $fresh ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public static function fresh(): self {
		return static::instance( true );
	}

	public function register_hooks() {
		add_filter(
			'elementor/editor/localize_settings',
			fn( array $settings ) => $this->add_atomic_dynamic_tags_to_editor_settings( $settings )
		);

		add_filter(
			'elementor/atomic-widgets/props-schema',
			fn( array $schema ) => Dynamic_Prop_Types_Mapping::make()->get_modified_prop_types( $schema )
		);

		add_action(
			'elementor/atomic-widgets/settings/transformers/register',
<<<<<<< HEAD
			fn ( $transformers, $prop_resolver ) => $this->register_transformers( $transformers, $prop_resolver ),
			10,
			2
=======
			fn ( $transformers ) => $this->register_transformers( $transformers )
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		);
	}

	private function add_atomic_dynamic_tags_to_editor_settings( $settings ) {
		if ( isset( $settings['dynamicTags']['tags'] ) ) {
			$settings['atomicDynamicTags'] = [
				'tags' => $this->registry->get_tags(),
				'groups' => Plugin::$instance->dynamic_tags->get_config()['groups'],
			];
		}

		return $settings;
	}

<<<<<<< HEAD
	private function register_transformers( Transformers_Registry $transformers, Props_Resolver $props_resolver ) {
		$transformers->register(
			Dynamic_Prop_Type::get_key(),
			new Dynamic_Transformer(
				Plugin::$instance->dynamic_tags,
				$this->schemas,
				$props_resolver
			)
=======
	private function register_transformers( Transformers_Registry $transformers ) {
		$transformers->register(
			Dynamic_Prop_Type::get_key(),
			new Dynamic_Transformer( Plugin::$instance->dynamic_tags )
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		);
	}
}
