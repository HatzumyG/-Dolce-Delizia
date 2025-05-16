<<<<<<< HEAD
<?php declare(strict_types=1);

namespace Automattic\WooCommerce\Blocks\BlockTypes;

=======
<?php
namespace Automattic\WooCommerce\Blocks\BlockTypes;

use Automattic\WooCommerce\Blocks\Utils\StyleAttributesUtils;

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
/**
 * ProductGalleryLargeImage class.
 */
class ProductGalleryLargeImageNextPrevious extends AbstractBlock {
	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'product-gallery-large-image-next-previous';

	/**
	 * It isn't necessary register block assets because it is a server side block.
	 */
	protected function register_block_type_assets() {
		return null;
	}

	/**
	 * Get the frontend style handle for this block type.
	 *
	 * @return null
	 */
	protected function get_block_type_style() {
		return null;
	}

	/**
<<<<<<< HEAD
=======
	 *  Register the context
	 *
	 * @return string[]
	 */
	protected function get_block_type_uses_context() {
		return [ 'nextPreviousButtonsPosition', 'productGalleryClientId' ];
	}

	/**
	 *  Return class suffix
	 *
	 * @param array $context Block context.
	 * @return string
	 */
	private function get_class_suffix( $context ) {
		switch ( $context['nextPreviousButtonsPosition'] ) {
			case 'insideTheImage':
				return 'inside-image';
			case 'outsideTheImage':
				return 'outside-image';
			case 'off':
			default:
				return 'off';
		}
	}

	/**
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 * Include and render the block.
	 *
	 * @param array    $attributes Block attributes. Default empty array.
	 * @param string   $content    Block content. Default empty string.
	 * @param WP_Block $block      Block instance.
	 * @return string Rendered block type output.
	 */
	protected function render( $attributes, $content, $block ) {
		$post_id = $block->context['postId'];
		if ( ! isset( $post_id ) ) {
			return '';
		}

		$product = wc_get_product( $post_id );

		if ( ! $product instanceof \WC_Product ) {
			return '';
		}

		$product_gallery = $product->get_gallery_image_ids();

		if ( empty( $product_gallery ) ) {
			return null;
		}

<<<<<<< HEAD
		$prev_button = $this->get_button( 'previous' );
=======
		$context      = $block->context;
		$class_suffix = $this->get_class_suffix( $context );

		if ( 'off' === $class_suffix ) {
			return null;
		}

		$prev_button = $this->get_button( 'previous', $context );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$p           = new \WP_HTML_Tag_Processor( $prev_button );

		if ( $p->next_tag() ) {
			$p->set_attribute(
<<<<<<< HEAD
				'data-wp-on--click',
=======
				'data-wc-on--click',
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
				'actions.selectPreviousImage'
			);
			$p->set_attribute(
				'aria-label',
				__( 'Previous image', 'woocommerce' )
			);
			$prev_button = $p->get_updated_html();
		}

<<<<<<< HEAD
		$next_button = $this->get_button( 'next' );
=======
		$next_button = $this->get_button( 'next', $context );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$p           = new \WP_HTML_Tag_Processor( $next_button );

		if ( $p->next_tag() ) {
			$p->set_attribute(
<<<<<<< HEAD
				'data-wp-on--click',
=======
				'data-wc-on--click',
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
				'actions.selectNextImage'
			);
			$p->set_attribute(
				'aria-label',
				__( 'Next image', 'woocommerce' )
			);
			$next_button = $p->get_updated_html();
		}

<<<<<<< HEAD
		return strtr(
			'<div
				class="wc-block-product-gallery-large-image-next-previous wp-block-woocommerce-product-gallery-large-image-next-previous"
				data-wp-interactive=\'{data_wp_interactive}\'
			>
				<div class="wc-block-product-gallery-large-image-next-previous-container">
=======
		$alignment_class = isset( $attributes['layout']['verticalAlignment'] ) ? 'is-vertically-aligned-' . $attributes['layout']['verticalAlignment'] : '';
		$position_class  = 'wc-block-product-gallery-large-image-next-previous--' . $class_suffix;

		return strtr(
			'<div
				class="wc-block-product-gallery-large-image-next-previous wp-block-woocommerce-product-gallery-large-image-next-previous {alignment_class}"
				data-wc-interactive=\'{data_wc_interactive}\'
			>
				<div class="wc-block-product-gallery-large-image-next-previous-container {position_class}">
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
					{prev_button}
					{next_button}
				</div>
		</div>',
			array(
				'{prev_button}'         => $prev_button,
				'{next_button}'         => $next_button,
<<<<<<< HEAD
				'{data_wp_interactive}' => 'woocommerce/product-gallery',
=======
				'{alignment_class}'     => $alignment_class,
				'{position_class}'      => $position_class,
				'{data_wc_interactive}' => wp_json_encode( array( 'namespace' => 'woocommerce/product-gallery' ), JSON_NUMERIC_CHECK | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP ),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			)
		);
	}

	/**
	 * Generates the HTML for a next or previous button for the product gallery large image.
	 *
	 * @param string $button_type The type of button to generate. Either 'previous' or 'next'.
<<<<<<< HEAD
	 * @return string The HTML for the generated button.
	 */
	protected function get_button( $button_type ) {
=======
	 * @param string $context     The block context.
	 * @return string The HTML for the generated button.
	 */
	protected function get_button( $button_type, $context ) {
		if ( 'insideTheImage' === $context['nextPreviousButtonsPosition'] ) {
			return $this->get_inside_button( $button_type, $context );
		}

		return $this->get_outside_button( $button_type, $context );
	}

	/**
	 * Returns an HTML button element with an SVG icon for the previous or next button when the buttons are inside the image.
	 *
	 * @param string $button_type The type of button to return. Either "previous" or "next".
	 * @param string $context The context in which the button is being used.
	 * @return string The HTML for the button element.
	 */
	protected function get_inside_button( $button_type, $context ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$previous_button_icon_path = 'M28.1 12L30.5 14L21.3 24L30.5 34L28.1 36L17.3 24L28.1 12Z';
		$next_button_icon_path     = 'M21.7001 12L19.3 14L28.5 24L19.3 34L21.7001 36L32.5 24L21.7001 12Z';
		$icon_path                 = $previous_button_icon_path;
		$button_side_class         = 'left';
<<<<<<< HEAD
		$button_disabled_directive = 'context.disableLeft';

		if ( 'next' === $button_type ) {
			$icon_path                 = $next_button_icon_path;
			$button_side_class         = 'right';
			$button_disabled_directive = 'context.disableRight';
=======

		if ( 'next' === $button_type ) {
			$icon_path         = $next_button_icon_path;
			$button_side_class = 'right';
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		}

		return sprintf(
			'<button
<<<<<<< HEAD
				data-wp-bind--disabled="%1$s"
				class="wc-block-product-gallery-large-image-next-previous--button wc-block-product-gallery-large-image-next-previous-%2$s"
=======
				data-wc-bind--disabled="state.disable%1$s"
				class="wc-block-product-gallery-large-image-next-previous--button wc-block-product-gallery-large-image-next-previous-%2$s--%3$s"
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			>
				<svg xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48" fill="none">
					<g filter="url(#filter0_b_397_11354)">
						<rect x="0.5" width="48" height="48" rx="5" fill="black" fill-opacity="0.5"/>
<<<<<<< HEAD
						<path d="%3$s" fill="white"/>
=======
						<path d="%4$s" fill="white"/>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
					</g>
					<defs>
						<filter id="filter0_b_397_11354" x="-9.5" y="-10" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix"/>
							<feGaussianBlur in="BackgroundImageFix" stdDeviation="5"/>
							<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_397_11354"/>
							<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_397_11354" result="shape"/>
						</filter>
					</defs>
				</svg>
			</button>',
<<<<<<< HEAD
			$button_disabled_directive,
			$button_side_class,
=======
			ucfirst( $button_side_class ),
			$button_side_class,
			$this->get_class_suffix( $context ),
			$icon_path
		);
	}

	/**
	 * Returns an HTML button element with an SVG icon for the previous or next button when the buttons are outside the image.
	 *
	 * @param string $button_type The type of button to return. Either "previous" or "next".
	 * @param string $context The context in which the button is being used.
	 * @return string The HTML for the button element.
	 */
	protected function get_outside_button( $button_type, $context ) {
		$next_button_icon_path     = 'M1 1.28516L8 8.28516L1 15.2852';
		$previous_button_icon_path = 'M9 1.28516L2 8.28516L9 15.2852';
		$icon_path                 = $previous_button_icon_path;
		$button_side_class         = 'left';

		if ( 'next' === $button_type ) {
			$icon_path         = $next_button_icon_path;
			$button_side_class = 'right';
		}

		return sprintf(
			'<button
				data-wc-bind--disabled="state.disable%1$s"
				class="wc-block-product-gallery-large-image-next-previous--button wc-block-product-gallery-large-image-next-previous-%2$s--%3$s"
			>
				<svg
					width="10"
					height="16"
					viewBox="0 0 10 16"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="%4$s"
						stroke="black"
						stroke-width="1.5"
					/>
				</svg>
			</button>',
			ucfirst( $button_side_class ),
			$button_side_class,
			$this->get_class_suffix( $context ),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			$icon_path
		);
	}
}
