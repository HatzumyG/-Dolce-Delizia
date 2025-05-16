<?php
/**
 * @package   Essential_Grid
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.essential-grid.com/
 * @copyright 2024 ThemePunch
 */

if( !defined( 'ABSPATH') ) exit();

/**
 * Add Visual Composer support
 */
class Essential_Grid_Vc {
	
	public function __construct() {
		if (is_admin()) {
			add_action('plugins_loaded', [$this, 'vc_include'], 15);
		} else {
			add_action('vc_before_init', [$this, 'check_vc']);
		}
	}

	/**
	 * load VC components in FrontEnd Editor of VC
	 * 
	 * @return void
	 */
	public function check_vc()
	{
		if (function_exists('vc_is_inline') && vc_is_inline()) {
			$this->add_assets();
		}
	}

	/**
	 * Allow for VC to use this plugin
	 *
	 * @return void
	 */
	public function vc_include()
	{
		if (!function_exists('vc_map')) return;
		add_action('init', [$this, 'add_assets']);
		do_action('essgrid_vc_include');
	}

	public function add_assets()
	{
		if (!class_exists('Essential_Grid_Assets')) {
			require_once(ESG_PLUGIN_PATH . 'admin/includes/assets.class.php');
		}
		
		$assets = Essential_Grid_Assets::get_instance();
		
		$assets->add_screen_fonts();
		$assets->add_screen_styles();
		$assets->add_screen_scripts();

		vc_map(apply_filters('essgrid_add_to_VC', [
			'name' => esc_attr__('Essential Grid', 'essential-grid'),
			'base' => 'ess_grid',
			'icon' => 'icon-wpb-ess-grid',
			'category' => esc_attr__('Content', 'essential-grid'),
			'show_settings_on_create' => false,
			'js_view' => 'VcEssentialGrid',
			'params' => [
				[
					'type' => 'ess_grid_shortcode',
					'heading' => esc_attr__('Alias', 'essential-grid'),
					'param_name' => 'alias',
					'admin_label' => true,
					'value' => ''
				],
				[
					'type' => 'ess_grid_shortcode',
					'heading' => esc_attr__('Settings', 'essential-grid'),
					'param_name' => 'settings',
					'admin_label' => true,
					'value' => ''
				],
				[
					'type' => 'ess_grid_shortcode',
					'heading' => esc_attr__('Layers', 'essential-grid'),
					'param_name' => 'layers',
					'admin_label' => true,
					'value' => ''
				],
				[
					'type' => 'ess_grid_shortcode',
					'heading' => esc_attr__('Special', 'essential-grid'),
					'param_name' => 'special',
					'admin_label' => true,
					'value' => ''
				]
			]
		]));

		if (version_compare(WPB_VC_VERSION, '4.4', '>=')) {
			//use if 4.4 or newer
			vc_add_shortcode_param('ess_grid_shortcode', [$this, 'ess_grid_shortcode_settings_field']);
		} else {
			//use if older than 4.4
			add_shortcode_param('ess_grid_shortcode', [$this, 'ess_grid_shortcode_settings_field']);
		}

		do_action('essgrid_add_assets');
	}

	/**
	 * The Dialog for Visual Composer
	 * 
	 * @param array $settings
	 * @param mixed $value
	 * @return mixed
	 */
	public function ess_grid_shortcode_settings_field($settings, $value)
	{
		$dependency = vc_generate_dependencies_attributes($settings);

		return apply_filters(
			'essgrid_ess_grid_shortcode_settings_field', 
			'<div class="ess_grid_shortcode_block">'
			. '<input id="esg-vc-input-' . $settings['param_name'] . '" name="' . $settings['param_name']
			. '" class="wpb_vc_param_value wpb-textinput '
			. $settings['param_name'] . ' ' . $settings['type'] . '_field" type="text" value="'
			. $value . '" ' . $dependency . '/>'
			. '</div>',
			$settings,
			$value
		);
	}

}
