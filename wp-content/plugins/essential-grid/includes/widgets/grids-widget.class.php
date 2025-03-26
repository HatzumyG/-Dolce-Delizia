<?php
/**
 * @package   Essential_Grid
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.essential-grid.com/
 * @copyright 2024 ThemePunch
 */

if (!defined('ABSPATH')) exit();

class Essential_Grids_Widget extends WP_Widget
{

	public function __construct()
	{
		// widget actual processes
		$widget_ops = ['classname' => 'widget_ess_grid', 'description' => esc_attr__('Displays certain Essential Grid on the page', 'essential-grid')];
		parent::__construct('ess-grid-widget', esc_attr__('Essential Grid', 'essential-grid'), $widget_ops);
	}

	/**
	 * the form
	 */
	public function form($instance)
	{
		$arrGrids = Essential_Grid_Db::get_entity('grids')->get_grids_column('id', 'name');
		if (empty($arrGrids)) {
			echo esc_attr__("No Essential Grids found, Please create at least one!", 'essential-grid');
		} else {
			$field = "ess_grid";
			$fieldPages = "ess_grid_pages";
			$fieldCheck = "ess_grid_homepage";
			$fieldTitle = "ess_grid_title";

			$gridID = @$instance[$field];
			$homepage = @$instance[$fieldCheck];
			$pagesValue = @$instance[$fieldPages];
			$title = @$instance[$fieldTitle];

			$fieldID = $this->get_field_id($field);
			$fieldName = $this->get_field_name($field);

			$fieldID_check = $this->get_field_id($fieldCheck);
			$fieldName_check = $this->get_field_name($fieldCheck);

			$fieldPages_ID = $this->get_field_id($fieldPages);
			$fieldPages_Name = $this->get_field_name($fieldPages);

			$fieldTitle_ID = $this->get_field_id($fieldTitle);
			$fieldTitle_Name = $this->get_field_name($fieldTitle);

			?>
			<div class="div13"></div>
			<label for="<?php echo esc_attr($fieldTitle_ID); ?>"><?php esc_html_e('Title', 'essential-grid'); ?>:</label>
			<input type="text" name="<?php echo esc_attr($fieldTitle_Name); ?>" id="<?php echo esc_attr($fieldTitle_ID); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
			<div class="div13"></div>

			<?php esc_html_e('Choose Essential Grid', 'essential-grid'); ?>:
			<select name="<?php echo esc_attr($fieldName); ?>" id="<?php echo esc_attr($fieldID); ?>">
				<?php foreach ($arrGrids as $id => $name) { ?>
					<option value="<?php echo esc_attr($id); ?>"<?php echo ($gridID == $id) ? ' selected="selected"' : ''; ?>><?php echo esc_html($name); ?></option>
				<?php } ?>
			</select>

			<div class="div13"></div>

			<label for="<?php echo esc_attr($fieldID_check); ?>"><?php esc_html_e('Home Page Only', 'essential-grid'); ?>:</label>
			<input type="checkbox" class="esg-widget-checkbox" name="<?php echo esc_attr($fieldName_check); ?>" id="<?php echo esc_attr($fieldID_check); ?>" <?php checked( $homepage, 'on' ); ?> >
			<div class="div13"></div>
			<label for="<?php echo esc_attr($fieldPages_ID); ?>"><?php esc_html_e('Pages: (example: 3,8,15)', 'essential-grid'); ?></label>
			<input type="text" name="<?php echo esc_attr($fieldPages_Name); ?>" id="<?php echo esc_attr($fieldPages_ID); ?>" value="<?php echo esc_attr($pagesValue); ?>">
			<div class="div13"></div>
			<?php
		}
	}

	/**
	 * update
	 */
	public function update($new_instance, $old_instance)
	{
		return ($new_instance);
	}

	/**
	 * widget output
	 */
	public function widget($args, $instance)
	{
		$grid_id = $instance["ess_grid"];
		$title = apply_filters('widget_title', empty($instance['ess_grid_title']) ? '' : $instance['ess_grid_title'], $instance); //needed for WPML translation

		$homepageCheck = @$instance["ess_grid_homepage"];
		$homepage = "";
		if ($homepageCheck == "on") $homepage = "homepage";

		$pages = $instance["ess_grid_pages"];
		if (!empty($pages)) {
			if (!empty($homepage)) $homepage .= ",";
			$homepage .= $pages;
		}

		if (empty($grid_id)) return (false);

		//widget output
		$beforeWidget = $args["before_widget"];
		$afterWidget = $args["after_widget"];
		$beforeTitle = $args["before_title"];
		$afterTitle = $args["after_title"];

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		echo $beforeWidget;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		if (!empty($title)) echo $beforeTitle . esc_html($title) . $afterTitle;

		$caching = Essential_Grid_Base::getUseCache();
		$use_cache = $caching == 'true';

		// Enqueue Scripts
		Essential_Grid::enqueue_tptools();
		wp_enqueue_script('esg-essential-grid-script');

		// Enqueue Lightbox Style/Script
		if ($use_cache) {
			wp_enqueue_script('esg-tp-boxext');
		}

		$grid = new Essential_Grid();
		$grid->output_essential_grid($grid_id, $homepage);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		echo $afterWidget;
	}
}
