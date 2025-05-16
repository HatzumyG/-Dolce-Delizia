<?php
namespace Elementor\Modules\Library\Documents;

use Elementor\TemplateLibrary\Source_Local;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
<<<<<<< HEAD
	exit; // Exit if accessed directly.
=======
	exit; // Exit if accessed directly
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Elementor section library document.
 *
 * Elementor section library document handler class is responsible for
 * handling a document of a section type.
<<<<<<< HEAD
=======
 *
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
 */
class Not_Supported extends Library_Document {

	/**
	 * Get document properties.
	 *
	 * Retrieve the document properties.
	 *
	 * @access public
	 * @static
	 *
	 * @return array Document properties.
	 */
	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['admin_tab_group'] = '';
		$properties['register_type'] = false;
		$properties['is_editable'] = false;
		$properties['show_in_library'] = false;
		$properties['show_in_finder'] = false;

		return $properties;
	}

	public static function get_type() {
		return 'not-supported';
	}

	/**
	 * Get document title.
	 *
	 * Retrieve the document title.
	 *
	 * @access public
	 * @static
	 *
	 * @return string Document title.
	 */
	public static function get_title() {
		return esc_html__( 'Not Supported', 'elementor' );
	}

	public function save_template_type() {
		// Do nothing.
	}

	public function print_admin_column_type() {
		Utils::print_unescaped_internal_string( self::get_title() );
	}

	public function filter_admin_row_actions( $actions ) {
		unset( $actions['view'] );

		return $actions;
	}
}
