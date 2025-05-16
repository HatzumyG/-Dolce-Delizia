<?php
namespace Automattic\WooCommerce\StoreApi\Utilities;

use WC_Rate_Limiter;
use WC_Cache_Helper;

/**
 * RateLimits class.
 */
class RateLimits extends WC_Rate_Limiter {

	/**
	 * Cache group.
	 */
	const CACHE_GROUP = 'store_api_rate_limit';

	/**
	 * Rate limiting enabled default value.
	 *
	 * @var boolean
	 */
	const ENABLED = false;

	/**
	 * Proxy support enabled default value.
	 *
	 * @var boolean
	 */
	const PROXY_SUPPORT = false;

	/**
	 * Default amount of max requests allowed for the defined timeframe.
	 *
	 * @var int
	 */
	const LIMIT = 25;

	/**
	 * Default time in seconds before rate limits are reset.
	 *
	 * @var int
	 */
	const SECONDS = 10;

	/**
	 * Gets a cache prefix.
	 *
	 * @param string $action_id Identifier of the action.
	 * @return string
	 */
<<<<<<< HEAD
	protected static function get_cache_key( $action_id ): string {
=======
	protected static function get_cache_key( $action_id ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return WC_Cache_Helper::get_cache_prefix( 'store_api_rate_limit' . $action_id );
	}

	/**
	 * Get current rate limit row from DB and normalize types. This query is not cached, and returns
	 * a new rate limit row if none exists.
	 *
	 * @param string $action_id Identifier of the action.
<<<<<<< HEAD
	 *
	 * @return object Object containing reset and remaining.
	 */
	protected static function get_rate_limit_row( string $action_id ): object {
		global $wpdb;

		$time = time();

=======
	 * @return object Object containing reset and remaining.
	 */
	protected static function get_rate_limit_row( $action_id ) {
		global $wpdb;

>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$row = $wpdb->get_row(
			$wpdb->prepare(
				"
					SELECT rate_limit_expiry as reset, rate_limit_remaining as remaining
					FROM {$wpdb->prefix}wc_rate_limits
					WHERE rate_limit_key = %s
					AND rate_limit_expiry > %s
				",
				$action_id,
<<<<<<< HEAD
				$time
=======
				time()
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			),
			'OBJECT'
		);

		if ( empty( $row ) ) {
			$options = self::get_options();

			return (object) [
<<<<<<< HEAD
				'reset'     => (int) $options->seconds + $time,
=======
				'reset'     => (int) $options->seconds + time(),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
				'remaining' => (int) $options->limit,
			];
		}

		return (object) [
			'reset'     => (int) $row->reset,
			'remaining' => (int) $row->remaining,
		];
	}

	/**
	 * Returns current rate limit values using cache where possible.
	 *
	 * @param string $action_id Identifier of the action.
<<<<<<< HEAD
	 *
	 * @return object
	 */
	public static function get_rate_limit( string $action_id ): object {
=======
	 * @return object
	 */
	public static function get_rate_limit( $action_id ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$current_limit = self::get_cached( $action_id );

		if ( false === $current_limit ) {
			$current_limit = self::get_rate_limit_row( $action_id );
			self::set_cache( $action_id, $current_limit );
		}

		return $current_limit;
	}

	/**
	 * If exceeded, seconds until reset.
	 *
	 * @param string $action_id Identifier of the action.
	 *
	 * @return bool|int
	 */
<<<<<<< HEAD
	public static function is_exceeded_retry_after( string $action_id ) {
		$current_limit = self::get_rate_limit( $action_id );
		$time          = time();
		// Before the next run is allowed, retry forbidden.
		if ( $time <= (int) $current_limit->reset && 0 === (int) $current_limit->remaining ) {
			return (int) $current_limit->reset - $time;
=======
	public static function is_exceeded_retry_after( $action_id ) {
		$current_limit = self::get_rate_limit( $action_id );

		// Before the next run is allowed, retry forbidden.
		if ( time() <= $current_limit->reset && 0 === $current_limit->remaining ) {
			return (int) $current_limit->reset - time();
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		}

		// After the next run is allowed, retry allowed.
		return false;
	}

	/**
	 * Sets the rate limit delay in seconds for action with identifier $id.
	 *
	 * @param string $action_id Identifier of the action.
<<<<<<< HEAD
	 *
	 * @return object Current rate limits.
	 */
	public static function update_rate_limit( string $action_id ): object {
		global $wpdb;

		$options           = self::get_options();
		$time              = time();
		$rate_limit_expiry = $time + (int) $options->seconds;
=======
	 * @return object Current rate limits.
	 */
	public static function update_rate_limit( $action_id ) {
		global $wpdb;

		$options = self::get_options();

		$rate_limit_expiry = time() + $options->seconds;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

		$wpdb->query(
			$wpdb->prepare(
				"INSERT INTO {$wpdb->prefix}wc_rate_limits
					(`rate_limit_key`, `rate_limit_expiry`, `rate_limit_remaining`)
				VALUES
					(%s, %d, %d)
				ON DUPLICATE KEY UPDATE
					`rate_limit_remaining` = IF(`rate_limit_expiry` < %d, VALUES(`rate_limit_remaining`), GREATEST(`rate_limit_remaining` - 1, 0)),
					`rate_limit_expiry` = IF(`rate_limit_expiry` < %d, VALUES(`rate_limit_expiry`), `rate_limit_expiry`);
				",
				$action_id,
				$rate_limit_expiry,
<<<<<<< HEAD
				(int) $options->limit - 1,
				$time,
				$time
=======
				$options->limit - 1,
				time(),
				time()
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			)
		);

		$current_limit = self::get_rate_limit_row( $action_id );

		self::set_cache( $action_id, $current_limit );

		return $current_limit;
	}

	/**
	 * Retrieve a cached store api rate limit.
	 *
	 * @param string $action_id Identifier of the action.
<<<<<<< HEAD
	 * @return false|object
=======
	 * @return bool|object
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	 */
	protected static function get_cached( $action_id ) {
		return wp_cache_get( self::get_cache_key( $action_id ), self::CACHE_GROUP );
	}

	/**
	 * Cache a rate limit.
	 *
	 * @param string $action_id Identifier of the action.
	 * @param object $current_limit Current limit object with expiry and retries remaining.
	 * @return bool
	 */
<<<<<<< HEAD
	protected static function set_cache( $action_id, $current_limit ): bool {
=======
	protected static function set_cache( $action_id, $current_limit ) {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return wp_cache_set( self::get_cache_key( $action_id ), $current_limit, self::CACHE_GROUP );
	}

	/**
	 * Return options for Rate Limits, to be returned by the "woocommerce_store_api_rate_limit_options" filter.
	 *
	 * @return object Default options.
	 */
<<<<<<< HEAD
	public static function get_options(): object {
=======
	public static function get_options() {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		$default_options = [
			/**
			 * Filters the Store API rate limit check, which is disabled by default.
			 *
			 * This can be used also to disable the rate limit check when testing API endpoints via a REST API client.
			 */
			'enabled'       => self::ENABLED,

			/**
			 * Filters whether proxy support is enabled for the Store API rate limit check. This is disabled by default.
			 *
			 * If the store is behind a proxy, load balancer, CDN etc. the user can enable this to properly obtain
			 * the client's IP address through standard transport headers.
			 */
			'proxy_support' => self::PROXY_SUPPORT,

			'limit'         => self::LIMIT,
			'seconds'       => self::SECONDS,
		];

		return (object) array_merge( // By using array_merge we ensure we get a properly populated options object.
			$default_options,
			/**
			 * Filters options for Rate Limits.
			 *
			 * @param array $rate_limit_options Array of option values.
			 * @return array
			 *
			 * @since 8.9.0
			 */
			apply_filters(
				'woocommerce_store_api_rate_limit_options',
				$default_options
			)
		);
	}

	/**
	 * Gets a single option through provided name.
	 *
	 * @param string $option Option name.
	 *
	 * @return mixed
	 */
	public static function get_option( $option ) {

		if ( ! is_string( $option ) || ! defined( 'RateLimits::' . strtoupper( $option ) ) ) {
			return null;
		}

		return self::get_options()[ $option ];
	}
}
