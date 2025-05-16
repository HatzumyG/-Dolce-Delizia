<?php
/**
 * Title: Coming Soon
 * Slug: woocommerce/coming-soon
 * Categories: WooCommerce
 * Inserter: false
 * Feature Flag: launch-your-store
 *
 * @package WooCommerce\Blocks
 */

$store_pages_only = 'yes' === get_option( 'woocommerce_store_pages_only', 'no' );
<<<<<<< HEAD
$default_pattern  = $store_pages_only ? 'coming-soon-store-only' : 'page-coming-soon-default';

=======
$default_pattern  = $store_pages_only ? 'coming-soon-store-only' : 'coming-soon-entire-site';

if ( class_exists( 'Automattic\WooCommerce\Admin\Features\Features', false ) &&
	\Automattic\WooCommerce\Admin\Features\Features::is_enabled( 'coming-soon-newsletter-template' ) ) {
	$default_pattern = $store_pages_only ? 'coming-soon-store-only' : 'page-coming-soon-default';
}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
?>

<!-- wp:pattern {"slug":"woocommerce/<?php echo $default_pattern; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"} /-->
