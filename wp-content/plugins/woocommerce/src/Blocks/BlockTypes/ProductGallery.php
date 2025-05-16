<?php
<<<<<<< HEAD
declare( strict_types=1 );
namespace Automattic\WooCommerce\Blocks\BlockTypes;

=======
namespace Automattic\WooCommerce\Blocks\BlockTypes;

use Automattic\WooCommerce\Blocks\Utils\BlockTemplateUtils;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
use Automattic\WooCommerce\Blocks\Utils\ProductGalleryUtils;
use Automattic\WooCommerce\Blocks\Utils\StyleAttributesUtils;
use Automattic\WooCommerce\Enums\ProductType;

/**
 * ProductGallery class.
 */
class ProductGallery extends AbstractBlock {
	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'product-gallery';

	/**
<<<<<<< HEAD
=======
	 * Used to preserve the context for dialog rendering.
	 *
	 * @var array
	 */
	protected $dialog_context;

	/**
	 * Initialize the block and Hook into the `render_block_context` filter
	 * to update the context for dialog rendering.
	 */
	protected function initialize() {
		parent::initialize();
		add_filter( 'render_block_context', [ $this, 'inject_dialog_context' ], 10, 3 );
	}

	/**
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 *  Register the context
	 *
	 * @return string[]
	 */
	protected function get_block_type_uses_context() {
		return [ 'postId' ];
	}

	/**
<<<<<<< HEAD
	 * Return the dialog content.
	 *
	 * @param array $product_gallery_full_images The full images of the product gallery.
	 * @return string
	 */
	protected function render_dialog( $product_gallery_full_images ) {
		$images_html = '';
		foreach ( $product_gallery_full_images as $index => $image ) {
			$image_number = $index + 1;
			$images_html .= str_replace( '<img', '<img tabindex="0" data-image-index="' . $image_number . '"', $image );
		}

		return sprintf(
			'<dialog
				data-wp-ref
				data-wp-bind--open="context.isDialogOpen"
				data-wp-on--close="actions.closeDialog"
				data-wp-on--keydown="actions.onDialogKeyDown"
				data-wp-watch="callbacks.dialogStateChange"
				class="wc-block-product-gallery-dialog"
				role="dialog"
				aria-modal="true"
				tabindex="-1"
				aria-label="Product Gallery">
				<div class="wc-block-product-gallery-dialog__content">
					<button class="wc-block-product-gallery-dialog__close-button" data-wp-on--click="actions.closeDialog" aria-label="%s">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false">
							<path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path>
						</svg>
					</button>
					<div class="wc-block-product-gallery-dialog__images-container">
						<div class="wc-block-product-gallery-dialog__images">
							%s
						</div>
					</div>
				</div>
			</dialog>',
			esc_attr__( 'Close dialog', 'woocommerce' ),
			$images_html
		);
=======
	 * Inject the single productcontext into the dialog blocks.
	 *
	 * @param array $context The block context.
	 * @param array $block The block.
	 * @param array $parent_block The parent block.
	 * @return array The updated block context.
	 */
	public function inject_dialog_context( $context, $block, $parent_block ) {
		$expected_inner_blocks = [
			'woocommerce/product-gallery',
			'woocommerce/product-gallery-large-image',
			'woocommerce/product-gallery-large-image-next-previous',
			'woocommerce/product-gallery-pager',
			'woocommerce/product-gallery-thumbnails',
		];
		$is_single_product     = $this->dialog_context['singleProduct'] ?? false;

		if ( $is_single_product && in_array( $block['blockName'], $expected_inner_blocks, true ) ) {
			return array_merge( $context, $this->dialog_context );
		}

		return $context;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	}

	/**
	 * Inject dialog into the product gallery HTML.
	 *
	 * @param string $gallery_html The gallery HTML.
	 * @param string $dialog_html  The dialog HTML.
	 *
	 * @return string
	 */
	protected function inject_dialog( $gallery_html, $dialog_html ) {

		// Find the position of the last </div>.
		$pos = strrpos( $gallery_html, '</div>' );

		if ( false !== $pos ) {
			// Inject the dialog_html at the correct position.
			$html = substr_replace( $gallery_html, $dialog_html, $pos, 0 );

			return $html;
		}
	}

	/**
<<<<<<< HEAD
=======
	 * Return the dialog content.
	 *
	 * @return string
	 */
	protected function render_dialog() {
		$template_part = BlockTemplateUtils::get_template_part( 'product-gallery' );

		$parsed_template = parse_blocks(
			$template_part
		);

		$html = array_reduce(
			$parsed_template,
			function ( $carry, $item ) {
				return $carry . render_block( $item );
			},
			''
		);

		$html_processor = new \WP_HTML_Tag_Processor( $html );

		$html_processor->next_tag(
			array(
				'class_name' => 'wp-block-woocommerce-product-gallery',
			)
		);

		$html_processor->remove_attribute( 'data-wc-context' );

		$gallery_dialog = strtr(
			'
			<dialog data-wc-bind--open="context.isDialogOpen" role="dialog" aria-modal="true" aria-label="{{dialog_aria_label}}" hidden data-wc-bind--hidden="!context.isDialogOpen" data-wc-watch="callbacks.keyboardAccess" data-wc-watch--dialog-focus-trap="callbacks.dialogFocusTrap" data-wc-class--wc-block-product-gallery--dialog-open="context.isDialogOpen">
				<div class="wc-block-product-gallery-dialog__header">
				<div class="wc-block-product-galler-dialog__header-right">
					<button class="wc-block-product-gallery-dialog__close" data-wc-on--click="actions.closeDialog" aria-label="{{close_dialog_aria_label}}">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect width="24" height="24" rx="2"/>
							<path d="M13 11.8L19.1 5.5L18.1 4.5L12 10.7L5.9 4.5L4.9 5.5L11 11.8L4.5 18.5L5.5 19.5L12 12.9L18.5 19.5L19.5 18.5L13 11.8Z" fill="black"/>
						</svg>
					</button>
				</div>
				</div>
				<div class="wc-block-product-gallery-dialog__body">
					{{html}}
				</div>
			</dialog>',
			array(
				'{{html}}'                    => $html_processor->get_updated_html(),
				'{{dialog_aria_label}}'       => __( 'Product gallery', 'woocommerce' ),
				'{{close_dialog_aria_label}}' => __( 'Close Product Gallery dialog', 'woocommerce' ),
			)
		);
		remove_filter( 'render_block_context', [ $this, 'inject_dialog_context' ], 10 );
		return $gallery_dialog;
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
<<<<<<< HEAD
		$post_id = $block->context['postId'] ?? '';
		$product = wc_get_product( $post_id );
=======
		$this->dialog_context = $block->context;
		$post_id              = $block->context['postId'] ?? '';
		$product              = wc_get_product( $post_id );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

		if ( ! $product instanceof \WC_Product ) {
			return '';
		}

<<<<<<< HEAD
		wp_enqueue_script_module( $this->get_full_block_name() );

		$product_gallery_thumbnail_images = ProductGalleryUtils::get_product_gallery_images( $post_id, 'thumbnail', array() );
		$product_gallery_full_images      = ProductGalleryUtils::get_product_gallery_images( $post_id, 'full', array() );
		$classname_single_image           = '';

		if ( count( $product_gallery_thumbnail_images ) < 2 ) {
=======
		$product_gallery_images = ProductGalleryUtils::get_product_gallery_images( $post_id, 'thumbnail', array() );
		$classname_single_image = '';

		if ( count( $product_gallery_images ) < 2 ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			// The gallery consists of a single image.
			$classname_single_image = 'is-single-product-gallery-image';
		}

<<<<<<< HEAD
		$classname           = StyleAttributesUtils::get_classes_by_attributes( $attributes, array( 'extra_classes' ) );
		$product_id          = strval( $product->get_id() );
		$gallery_with_dialog = $this->inject_dialog( $content, $this->render_dialog( $product_gallery_full_images ) );
		$p                   = new \WP_HTML_Tag_Processor( $gallery_with_dialog );

		if ( $p->next_tag() ) {
			$p->set_attribute( 'data-wp-interactive', $this->get_full_block_name() );
			$p->set_attribute(
				'data-wp-context',
				wp_json_encode(
					array(
						'selectedImageNumber' => 1,
						'isDialogOpen'        => false,
						'disableLeft'         => true,
						'disableRight'        => false,
						'isDragging'          => false,
						'touchStartX'         => 0,
						'touchCurrentX'       => 0,
						'productId'           => $product_id,
						'imageIds'            => ProductGalleryUtils::get_product_gallery_image_ids( $product, null, false ),
            'styles'                 => array(
							'transform'        => 'scale(1.0)',
							'transform-origin' => '',
						),
=======
		$number_of_thumbnails           = $block->attributes['thumbnailsNumberOfThumbnails'] ?? 0;
		$classname                      = StyleAttributesUtils::get_classes_by_attributes( $attributes, array( 'extra_classes' ) );
		$dialog                         = isset( $attributes['mode'] ) && 'full' !== $attributes['mode'] ? $this->render_dialog() : '';
		$product_gallery_first_image    = ProductGalleryUtils::get_product_gallery_image_ids( $product, 1 );
		$product_gallery_first_image_id = reset( $product_gallery_first_image );
		$product_id                     = strval( $product->get_id() );

		$html = $this->inject_dialog( $content, $dialog );
		$p    = new \WP_HTML_Tag_Processor( $html );

		if ( $p->next_tag() ) {
			$p->set_attribute( 'data-wc-interactive', wp_json_encode( array( 'namespace' => 'woocommerce/product-gallery' ), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP ) );
			$p->set_attribute(
				'data-wc-context',
				wp_json_encode(
					array(
						'selectedImage'                   => $product_gallery_first_image_id,
						'firstMainImageId'                => $product_gallery_first_image_id,
						'isDialogOpen'                    => false,
						'visibleImagesIds'                => ProductGalleryUtils::get_product_gallery_image_ids( $product, $number_of_thumbnails, true ),
						'dialogVisibleImagesIds'          => ProductGalleryUtils::get_product_gallery_image_ids( $product, null, false ),
						'mouseIsOverPreviousOrNextButton' => false,
						'productId'                       => $product_id,
						'elementThatTriggeredDialogOpening' => null,
						'disableLeft'                     => true,
						'disableRight'                    => false,
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
					),
					JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP
				)
			);

			if ( $product->is_type( ProductType::VARIABLE ) ) {
<<<<<<< HEAD
				$p->set_attribute( 'data-wp-init--watch-changes-on-add-to-cart-form', 'callbacks.watchForChangesOnAddToCartForm' );
=======
				$p->set_attribute( 'data-wc-init--watch-changes-on-add-to-cart-form', 'callbacks.watchForChangesOnAddToCartForm' );
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			}

			$p->add_class( $classname );
			$p->add_class( $classname_single_image );
			$html = $p->get_updated_html();
		}

		return $html;
	}
<<<<<<< HEAD

	/**
	 * Disable the block type script, this uses script modules.
	 *
	 * @param string|null $key The key.
	 *
	 * @return null
	 */
	protected function get_block_type_script( $key = null ) {
		return null;
	}
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
