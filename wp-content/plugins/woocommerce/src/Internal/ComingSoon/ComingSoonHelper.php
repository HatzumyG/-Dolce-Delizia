<?php
namespace Automattic\WooCommerce\Internal\ComingSoon;

use Automattic\WooCommerce\Admin\WCAdminHelper;

/**
 * Provides helper methods for coming soon functionality.
 */
class ComingSoonHelper {

	/**
	 * Returns true when the entire site is live.
	 */
	public function is_site_live(): bool {
		return 'yes' !== get_option( 'woocommerce_coming_soon' );
	}

	/**
	 * Returns true when the entire site is coming soon mode.
	 */
	public function is_site_coming_soon(): bool {
		return 'yes' === get_option( 'woocommerce_coming_soon' ) && 'yes' !== get_option( 'woocommerce_store_pages_only' );
	}

	/**
	 * Returns true when only the store pages are in coming soon mode.
	 */
	public function is_store_coming_soon(): bool {
		return 'yes' === get_option( 'woocommerce_coming_soon' ) && 'yes' === get_option( 'woocommerce_store_pages_only' );
	}

	/**
<<<<<<< HEAD
	 * Return true if the current page should be shown in coming soon mode.
	 */
	public function is_current_page_coming_soon(): bool {
=======
	 * Returns true when the provided URL is behind a coming soon screen.
	 *
	 * @param string $url The URL to check.
	 */
	public function is_url_coming_soon( string $url ): bool {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		// Early exit if coming soon mode not active.
		if ( $this->is_site_live() ) {
			return false;
		}

		if ( $this->is_site_coming_soon() ) {
			return true;
		}

<<<<<<< HEAD
		// Check the current page is a store page when in "store coming soon" mode.
		if ( $this->is_store_coming_soon() && WCAdminHelper::is_current_page_store_page() ) {
=======
		// Check the URL is a store page when in "store coming soon" mode.
		if ( $this->is_store_coming_soon() && WCAdminHelper::is_store_page( $url ) ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			return true;
		}

		// Default to false.
		return false;
	}
<<<<<<< HEAD
=======

	/**
	 * Builds the relative URL from the WP instance.
	 *
	 * @internal
	 * @link https://wordpress.stackexchange.com/a/274572
	 * @param \WP $wp WordPress environment instance.
	 */
	public function get_url_from_wp( \WP $wp ) {
		return home_url( add_query_arg( $wp->query_vars, $wp->request ) );
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
