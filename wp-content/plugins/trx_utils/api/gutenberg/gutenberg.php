<?php
/**
 * Plugin support: Gutenberg
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.0.49
 */

// Don't load directly
if ( ! defined( 'TRX_UTILS_VERSION' ) ) {
    die( '-1' );
}

// Check if plugin 'Gutenberg' is installed and activated
// Attention! This function is used in many files and was moved to the api.php
/*
if ( !function_exists( 'trx_utils_exists_gutenberg' ) ) {
	function trx_utils_exists_gutenberg() {
		return function_exists( 'register_block_type' );
	}
}
*/

// Check if plugin 'Gutenberg' is installed and activated
if ( ! function_exists( 'trx_utils_exists_gutenberg' ) ) {
    function trx_utils_exists_gutenberg() {
        return function_exists( 'register_block_type' );  // && function_exists( 'the_gutenberg_project' )
    }
}

// Check if current page is a PageBuilder preview mode
if ( ! function_exists( 'trx_utils_is_preview' ) ) {
    function trx_utils_is_preview( $builder = 'any' ) {
        return ( in_array( $builder, array( 'any', 'elm', 'elementor' ) ) && function_exists( 'trx_utils_elm_is_preview' ) && trx_utils_elm_is_preview() )
            ||
            ( in_array( $builder, array( 'any', 'gb', 'gutenberg' ) ) && function_exists( 'trx_utils_gutenberg_is_preview' ) && trx_utils_gutenberg_is_preview() );
    }
}

// Return true if Gutenberg exists and current mode is preview
if ( !function_exists( 'trx_utils_gutenberg_is_preview' ) ) {
    function trx_utils_gutenberg_is_preview() {
        return trx_utils_exists_gutenberg()
            && (
                trx_utils_gutenberg_is_block_render_action()
                ||
                trx_utils_is_post_edit()
                ||
                trx_utils_gutenberg_is_widgets_block_editor()
                ||
                trx_utils_gutenberg_is_site_editor()
            );
    }
}


// Return true if Gutenberg exists and current mode is preview
if ( !function_exists( 'trx_utils_gutenberg_is_preview' ) ) {
    function trx_utils_gutenberg_is_preview() {
        return trx_utils_exists_gutenberg()
            && (
                trx_utils_gutenberg_is_block_render_action()
                ||
                trx_utils_is_post_edit()
                ||
                trx_utils_gutenberg_is_widgets_block_editor()
                ||
                trx_utils_gutenberg_is_site_editor()
            );
    }
}

// Return true if current mode is "Block render"
if ( !function_exists( 'trx_utils_gutenberg_is_block_render_action' ) ) {
    function trx_utils_gutenberg_is_block_render_action() {
        return trx_utils_exists_gutenberg()
            && trx_utils_check_url('block-renderer') && !empty($_GET['context']) && $_GET['context']=='edit';
    }
}

// Return true if current mode is "Edit post"
if ( ! function_exists( 'trx_utils_is_post_edit' ) ) {
    function trx_utils_is_post_edit() {
        return ( trx_utils_check_url( 'post.php' ) && ! empty( $_GET['action'] ) && $_GET['action'] == 'edit' )
            ||
            trx_utils_check_url( 'post-new.php' )
            ||
            ( trx_utils_check_url( '/block-renderer/trx-addons/' ) && ! empty( $_GET['context'] ) && $_GET['context'] == 'edit' )
            ||
            ( trx_utils_check_url( 'admin.php' ) && ! empty( $_GET['page'] ) && $_GET['page'] == 'gutenberg-edit-site' )
            ||
            ( trx_utils_check_url( 'site-editor.php' ) && ( empty( $_GET['postType'] ) || $_GET['postType'] == 'wp_template' ) )
            ||
            trx_utils_check_url( 'widgets.php' );
    }
}

// Return true if current mode is "Widgets Block Editor" (a new widgets panel with Gutenberg support)
if ( ! function_exists( 'trx_utils_gutenberg_is_widgets_block_editor' ) ) {
    function trx_utils_gutenberg_is_widgets_block_editor() {
        return is_admin()
            && trx_utils_exists_gutenberg()
            && version_compare( get_bloginfo( 'version' ), '5.8', '>=' )
            && trx_utils_check_url( 'widgets.php' )
            && function_exists( 'wp_use_widgets_block_editor' )
            && wp_use_widgets_block_editor();
    }
}

// Return true if current mode is "Full Site Editor"
if ( ! function_exists( 'trx_utils_gutenberg_is_site_editor' ) ) {
    function trx_utils_gutenberg_is_site_editor() {
        return is_admin()
            && trx_utils_exists_gutenberg()
            && version_compare( get_bloginfo( 'version' ), '5.9', '>=' )
            && trx_utils_check_url( 'site-editor.php' )
            && function_exists( 'wp_is_block_theme' )
            && wp_is_block_theme();
    }
}

if (!function_exists('trx_utils_check_url')) {
    function trx_utils_check_url($val='') {
        if (!is_array($val)) $val = array($val);
        $rez = false;
        foreach	($val as $s) {
            $rez = strpos($_SERVER['REQUEST_URI'], $s)!==false;
            if ($rez) break;
        }
        return $rez;
    }
}
