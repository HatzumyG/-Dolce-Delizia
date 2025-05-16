<?php

namespace Elementor\Modules\AtomicWidgets\PropsResolver\Transformers\Settings;

use Elementor\Modules\AtomicWidgets\PropsResolver\Transformer_Base;
<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\PropTypes\Url_Prop_Type;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Link_Transformer extends Transformer_Base {
<<<<<<< HEAD
	public function transform( $value, $key ): ?array {
		$url = $this->extract_url( $value );

		if ( ! Url_Prop_Type::validate_url( $url ) ) {
			return null;
		}

		$link_attrs = [
			'href' => esc_url( $url ),
			'target' => $value['isTargetBlank'] ? '_blank' : '_self',
=======
	public function transform( $value, $key ): array {
		if ( empty( $value['enabled'] ) ) {
			return [];
		}

		if ( empty( $value['href'] ) ) {
			throw new \Exception( 'Url is not provided.' );
		}

		$link_attrs = [
			'href' => esc_url( $value['href'] ),
			'target' => $value['isTargetBlank'] ? '_blank' : '',
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		];

		return array_filter( $link_attrs );
	}
<<<<<<< HEAD

	private function extract_url( $value ): ?string {
		$destination = $value['destination'];
		$post = is_numeric( $destination ) ? get_post( $destination ) : null;

		return $post ? $post->guid : $destination;
	}
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
