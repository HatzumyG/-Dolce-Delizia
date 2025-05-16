<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('sweet_dessert_trx_updater_theme_setup')) {
    add_action( 'sweet_dessert_action_before_init_theme', 'sweet_dessert_trx_updater_theme_setup' );
    function sweet_dessert_trx_updater_theme_setup() {

        if (is_admin()) {
            add_filter( 'sweet_dessert_filter_importer_required_plugins',	'sweet_dessert_trx_updater_importer_required_plugins', 10, 2 );
            add_filter( 'sweet_dessert_filter_required_plugins',				'sweet_dessert_trx_updater_required_plugins' );
        }
    }
}

// Check if RevSlider installed and activated
if ( !function_exists( 'sweet_dessert_exists_trx_updater' ) ) {
    function sweet_dessert_exists_trx_updater() {
        return defined( 'TRX_UPDATER_VERSION' );
    }
}



// Filter to add in the required plugins list
if ( !function_exists( 'sweet_dessert_trx_updater_required_plugins' ) ) {
    function sweet_dessert_trx_updater_required_plugins($list=array()) {
        if (in_array('trx_updater', sweet_dessert_storage_get('required_plugins'))) {
            $path = sweet_dessert_get_file_dir('plugins/install/trx_updater.zip');
            if (file_exists($path)) {
                $list[] = array(
                    'name' 		=> esc_html__('ThemeREX Updater', 'sweet-dessert'),
                    'slug' 		=> 'trx_updater',
                    'version'  => '2.1.6',
                    'source'	=> $path,
                    'required' 	=> false
                );
            }
        }
        return $list;
    }
}