<?php

namespace Elementor\Core\Isolation;

use Elementor\Core\Settings\Manager;
use Elementor\Core\Upgrade\Manager as Upgrade_Manager;

class Wordpress_Adapter implements Wordpress_Adapter_Interface {

	public function get_plugins(): array {
		return get_plugins();
	}

	public function is_plugin_active( $plugin_path ): bool {
		return is_plugin_active( $plugin_path );
	}

	public function wp_nonce_url( $url, $action ): string {
		return wp_nonce_url( $url, $action );
	}

	public function self_admin_url( $path ): string {
		return self_admin_url( $path );
	}

	/**
	 * Retrieves an array of pages (or hierarchical post type items).
	 *
	 * @return WP_Post[]|false Array of pages (or hierarchical post type items). Boolean false if the
	 *                         specified post type is not hierarchical or the specified status is not
	 *                         supported by the post type.
	 */
<<<<<<< HEAD
	public function get_pages( $args ): ?array {
=======
	public function get_pages( $args ) : ?array {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return get_pages( $args );
	}

	/**
	 * Creates and returns a wp query instance.
	 *
	 * @return \WP_Query
	 */
<<<<<<< HEAD
	public function get_query( $args ): ?\WP_Query {
=======
	public function get_query( $args ) : ?\WP_Query {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		return new \WP_Query( $args );
	}

	public function get_option( $option_key ) {
		return get_option( $option_key );
	}

<<<<<<< HEAD
	public function update_option( $option_key, $option_value ): void {
		update_option( $option_key, $option_value );
	}

	public function add_option( $option_key, $option_value ): void {
=======
	public function update_option( $option_key, $option_value ) : void {
		update_option( $option_key, $option_value );
	}

	public function add_option( $option_key, $option_value ) : void {
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		add_option( $option_key, $option_value );
	}

	public function get_user_preferences( $preference_key ) {
		return Manager::get_settings_managers( 'editorPreferences' )
			->get_model()
			->get_settings( $preference_key );
	}

	public function set_user_preferences( $preference_key, $value ) {
		Manager::get_settings_managers( 'editorPreferences' )
			->get_model()
			->set_settings( $preference_key, $value );
	}

	public function is_new_installation() {
		return Upgrade_Manager::is_new_installation();
	}

<<<<<<< HEAD
	public function add_query_arg( $args, $url ): string {
		return add_query_arg( $args, $url );
	}

	public function has_custom_logo(): bool {
		return has_custom_logo();
	}

	public function current_user_can( $capability, $args ): bool {
		return current_user_can( $capability, $args );
	}

	public function get_post_status( $post_id ): string {
		return get_post_status( $post_id );
	}

	public function get_posts( $args ): array {
		return get_posts( $args );
	}

	public function get_post_types( $args = [], $output = 'names', $operator = 'and' ): array {
		return get_post_types( $args, $output, $operator );
	}
=======
	public function add_query_arg( $args, $url ) : string {
		return add_query_arg( $args, $url );
	}

	public function has_custom_logo() : bool {
		return has_custom_logo();
	}

	public function current_user_can( $capability, $args ) : bool {
		return current_user_can( $capability, $args );
	}

	public function get_post_status( $post_id ) : string {
		return get_post_status( $post_id );
	}
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}
