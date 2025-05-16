<?php

namespace Elementor\Modules\AtomicWidgets\DynamicTags;

<<<<<<< HEAD
use Elementor\Core\DynamicTags\Manager as Dynamic_Tags_Manager;
use Elementor\Modules\AtomicWidgets\PropsResolver\Props_Resolver;
=======
use Elementor\Core\DynamicTags\Manager as Dynamic_Manager;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Modules\AtomicWidgets\PropsResolver\Transformer_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Dynamic_Transformer extends Transformer_Base {
<<<<<<< HEAD
	private Dynamic_Tags_Manager $dynamic_tags_manager;
	private Dynamic_Tags_Schemas $dynamic_tags_schemas;
	private Props_Resolver $props_resolver;

	public function __construct(
		Dynamic_Tags_Manager $dynamic_tags_manager,
		Dynamic_Tags_Schemas $dynamic_tags_schemas,
		Props_Resolver $props_resolver
	) {
		$this->dynamic_tags_manager = $dynamic_tags_manager;
		$this->dynamic_tags_schemas = $dynamic_tags_schemas;
		$this->props_resolver = $props_resolver;
=======
	private Dynamic_Manager $dynamic_manager;

	public function __construct( Dynamic_Manager $dynamic_manager ) {
		$this->dynamic_manager = $dynamic_manager;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	public function transform( $value, $key ) {
		if ( ! isset( $value['name'] ) || ! is_string( $value['name'] ) ) {
			throw new \Exception( 'Dynamic tag name must be a string' );
		}

		if ( isset( $value['settings'] ) && ! is_array( $value['settings'] ) ) {
			throw new \Exception( 'Dynamic tag settings must be an array' );
		}

<<<<<<< HEAD
		$schema = $this->dynamic_tags_schemas->get( $value['name'] );

		$settings = $this->props_resolver->resolve(
			$schema,
			$value['settings'] ?? []
		);

		return $this->dynamic_tags_manager->get_tag_data_content( null, $value['name'], $settings );
=======
		return $this->dynamic_manager->get_tag_data_content(
			null,
			$value['name'],
			$value['settings'] ?? []
		);
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}
}
