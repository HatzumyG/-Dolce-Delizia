<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('sweet_dessert_contact_form_7_theme_setup')) {
    add_action( 'sweet_dessert_action_before_init_theme', 'sweet_dessert_contact_form_7_theme_setup', 1 );
    function sweet_dessert_contact_form_7_theme_setup() {
		if (sweet_dessert_exists_contact_form_7()) {
			add_action('sweet_dessert_action_add_styles', 				'sweet_dessert_contact_form_7_frontend_scripts' );
		}		
			
        if (is_admin()) {
            add_filter( 'sweet_dessert_filter_required_plugins', 'sweet_dessert_contact_form_7_required_plugins' );
        }
    }
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'sweet_dessert_exists_contact_form_7' ) ) {
    function sweet_dessert_exists_contact_form_7() {
		return class_exists('WPCF7') && class_exists('WPCF7_ContactForm');
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'sweet_dessert_contact_form_7_required_plugins' ) ) {

    function sweet_dessert_contact_form_7_required_plugins($list=array()) {
        if (in_array('contact_form_7', (array)sweet_dessert_storage_get('required_plugins')))
            $list[] = array(
                'name'         => esc_html__('Contact Form 7', 'sweet-dessert'),
                'slug'         => 'contact-form-7',
                'required'     => false
            );
        return $list;
    }
}

if ( ! function_exists( 'sweet_dessert_wpcf7_autop_or_not' ) ) {
    add_filter( 'wpcf7_autop_or_not', 'sweet_dessert_wpcf7_autop_or_not' );
        function sweet_dessert_wpcf7_autop_or_not() {
        return false;
    }
}

if ( !function_exists( 'sweet_dessert_contact_form_7_frontend_scripts' ) ) {
	
	function sweet_dessert_contact_form_7_frontend_scripts() {
		
			if (file_exists(sweet_dessert_get_file_dir('css/plugin.contact-form-7.css')))
                wp_enqueue_style( 'sweet-dessert-plugin-contact-form-7-style',  sweet_dessert_get_file_url('css/plugin.contact-form-7.css'), array(), null );
	}
}