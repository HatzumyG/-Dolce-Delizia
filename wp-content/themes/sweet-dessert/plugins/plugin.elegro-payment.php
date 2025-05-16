<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('sweet_dessert_elegro_payment_theme_setup')) {
    add_action( 'sweet_dessert_action_before_init_theme', 'sweet_dessert_elegro_payment_theme_setup', 1 );
    function sweet_dessert_elegro_payment_theme_setup() {
        if (is_admin()) {
            add_filter( 'sweet_dessert_filter_required_plugins',		'sweet_dessert_elegro_payment_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'sweet_dessert_elegro_payment_required_plugins' ) ) {
    function sweet_dessert_elegro_payment_required_plugins($list=array()) {
        if (in_array('elegro-payment', (array)sweet_dessert_storage_get('required_plugins'))) {
            $list[] = array(
                'name' 		=> esc_html__('Elegro Payment', 'sweet-dessert'),
                'slug' 		=> 'elegro-payment',
                'required' 	=> false
            );
        }
        return $list;
    }
}


// Check if plugin installed and activated
if ( !function_exists( 'sweet_dessert_exists_elegro_payment' ) ) {
    function sweet_dessert_exists_elegro_payment() {
        return class_exists( 'WC_Elegro_Payment' );
    }
}


// Add our ref to the link
if ( !function_exists( 'sweet_dessert_elegro_payment_add_ref' ) ) {
    add_filter( 'woocommerce_settings_api_form_fields_elegro', 'sweet_dessert_elegro_payment_add_ref' );
    function sweet_dessert_elegro_payment_add_ref( $fields ) {
        if ( ! empty( $fields['listen_url']['description'] ) ) {
            $fields['listen_url']['description'] = preg_replace( '/href="([^"]+)"/', 'href="$1?ref=246218d7-a23d-444d-83c5-a884ecfa4ebd"', $fields['listen_url']['description'] );
        }
        return $fields;
    }
}
?>