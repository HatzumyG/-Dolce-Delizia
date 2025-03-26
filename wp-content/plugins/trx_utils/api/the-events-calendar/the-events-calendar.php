<?php
/**
 * Plugin support: The Events Calendar
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Check if Tribe Events installed and activated
if (!function_exists('trx_utils_exists_tribe_events')) {
	function trx_utils_exists_tribe_events() {
		return class_exists( 'Tribe__Events__Main' );
	}
}

// One-click import support
//------------------------------------------------------------------------

// Check plugin in the required plugins
if ( !function_exists( 'trx_utils_tribe_events_importer_required_plugins' ) ) {
	if (is_admin()) add_filter( 'trx_utils_filter_importer_required_plugins',	'trx_utils_tribe_events_importer_required_plugins', 10, 2 );
	function trx_utils_tribe_events_importer_required_plugins($not_installed='', $list='') {
		if (strpos($list, 'the-events-calendar')!==false && !trx_utils_exists_tribe_events() )
			$not_installed .= '<br>' . esc_html__('Tribe Events Calendar', 'trx_utils');
		return $not_installed;
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'trx_utils_tribe_events_importer_set_options' ) ) {
	if (is_admin()) add_filter( 'trx_utils_filter_importer_options',	'trx_utils_tribe_events_importer_set_options' );
	function trx_utils_tribe_events_importer_set_options($options=array()) {
		if ( trx_utils_exists_tribe_events() && in_array('the-events-calendar', $options['required_plugins']) ) {
			$options['additional_options'][] = 'tribe_events_calendar_options';
		}
		return $options;
	}
}

// Check if the row will be imported
if ( !function_exists( 'trx_utils_tribe_events_importer_check_row' ) ) {
	if (is_admin()) add_filter('trx_utils_filter_importer_import_row', 'trx_utils_tribe_events_importer_check_row', 9, 4);
	function trx_utils_tribe_events_importer_check_row($flag, $table, $row, $list) {
		if ($flag || strpos($list, 'the-events-calendar')===false) return $flag;
		if (trx_utils_exists_tribe_events() ) {
			if ($table == 'posts')
				$flag = in_array($row['post_type'], array(Tribe__Events__Main::POSTTYPE, Tribe__Events__Main::VENUE_POST_TYPE, Tribe__Events__Main::ORGANIZER_POST_TYPE));
		}
		return $flag;
	}
}

// Fix for the version 6.0+ to enable posts are created in the previous version
if ( !function_exists( 'trx_utils_tribe_events_importer_import_end' ) ) {
    add_action( 'trx_utils_action_importer_import_end', 'trx_utils_tribe_events_importer_import_end', 10, 1 );
    function trx_utils_tribe_events_importer_import_end( $importer = null ) {

        if ( trx_utils_exists_tribe_events() && class_exists( 'TEC\Events\Custom_Tables\V1\Repository\Events' ) ) {

            $tec = new TEC\Events\Custom_Tables\V1\Repository\Events();

            // A direct query is used
            global $wpdb;
            $events = $wpdb->get_results( "SELECT ID FROM " . esc_sql( $wpdb->prefix . 'posts' ) . " WHERE post_type='" . Tribe__Events__Main::POSTTYPE . "'", OBJECT );

            if ( is_array( $events ) ) {
                foreach( $events as $event ) {
                    $tec->update( $event->ID, array() );
                }
            }
        }
    }
}


?>