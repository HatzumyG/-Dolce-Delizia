<?php

namespace Elementor\Modules\AtomicWidgets\Styles;

use Elementor\Core\Files\CSS\Post;
use Elementor\Element_Base;
<<<<<<< HEAD
use Elementor\Modules\AtomicWidgets\Elements\Atomic_Element_Base;
use Elementor\Modules\AtomicWidgets\Elements\Atomic_Widget_Base;
=======
use Elementor\Modules\AtomicWidgets\Base\Atomic_Element_Base;
use Elementor\Modules\AtomicWidgets\Base\Atomic_Widget_Base;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Elementor\Plugin;

class Atomic_Widget_Styles {
	public function register_hooks() {
		add_action( 'elementor/element/parse_css', fn( Post $post, Element_Base $element ) => $this->parse_element_style( $post, $element ), 10, 2 );
	}

	private function parse_element_style( Post $post, Element_Base $element ) {
		if ( ! ( $element instanceof Atomic_Widget_Base || $element instanceof Atomic_Element_Base )
			|| Post::class !== get_class( $post ) ) {
			return;
		}

		$styles = $element->get_raw_data()['styles'];

		if ( empty( $styles ) ) {
			return;
		}

<<<<<<< HEAD
		$css = Styles_Renderer::make(
			Plugin::$instance->breakpoints->get_breakpoints_config()
		)->on_prop_transform( function( $key, $value ) use ( &$post ) {
			if ( 'font-family' !== $key ) {
				return;
			}

			$post->add_font( $value );
		} )->render( $styles );

		$post->get_stylesheet()->add_raw_css( $css );
	}
=======
		$this->styles_enqueue_fonts( $styles );

		$css = Styles_Renderer::make( [
			'breakpoints' => Plugin::$instance->breakpoints->get_breakpoints_config(),
		] )->render( $styles );

		$post->get_stylesheet()->add_raw_css( $css );
	}

	/**
	 * @param array<int, array{
	 *     id: string,
	 *     type: string,
	 *     variants: array<int, array{
	 *         props: array<string, mixed>,
	 *         meta: array<string, mixed>
	 *     }>
	 * }> $styles
	 */
	private function styles_enqueue_fonts( array $styles ): void {
		foreach ( $styles as $style ) {
			foreach ( $style['variants'] as $variant ) {
				if ( isset( $variant['props']['font-family'] ) ) {
					Plugin::$instance->frontend->enqueue_font( $variant['props']['font-family'] );
				}
			}
		}
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
