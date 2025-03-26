<?php
/**
 * @package   Essential_Grid
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.essential-grid.com/
 * @copyright 2024 ThemePunch
 */

if (!defined('ABSPATH')) exit();

/**
 * Adds Pagination Widgets
 * @since 1.0.6
 */
class Essential_Grids_Widget_Pagination_Left extends WP_Widget
{

	public function __construct()
	{
		// widget actual processes
		$widget_ops = ['classname' => 'widget_ess_grid_pagination_left', 'description' => esc_attr__('Display the Left Icon for pagination of a certain Grid (Grid Navigation Settings in Navigations tab of the Grid has to be set to Widget)', 'essential-grid')];
		parent::__construct('ess-grid-widget-pagination-left', esc_attr__('Essential Grid Pagination Left', 'essential-grid'), $widget_ops);
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
			$fieldTitle = "ess_grid_title";

			$gridID = @$instance[$field];
			$title = @$instance[$fieldTitle];

			$fieldID = $this->get_field_id($field);
			$fieldName = $this->get_field_name($field);

			$fieldTitle_ID = $this->get_field_id($fieldTitle);
			$fieldTitle_Name = $this->get_field_name($fieldTitle);
			?>
			<label for="<?php echo esc_attr($fieldTitle_ID); ?>"><?php esc_html_e('Title', 'essential-grid'); ?>:</label>
			<input type="text" name="<?php echo esc_attr($fieldTitle_Name); ?>" id="<?php echo esc_attr($fieldTitle_ID); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
			<br><br>

			<?php esc_html_e('Choose Essential Grid', 'essential-grid'); ?>:
			<select name="<?php echo esc_attr($fieldName); ?>" id="<?php echo esc_attr($fieldID); ?>">
				<?php foreach ($arrGrids as $id => $name) { ?>
					<option value="<?php echo esc_attr($id); ?>"<?php echo ($gridID == $id) ? ' selected="selected"' : ''; ?>><?php echo esc_html($name); ?></option>
				<?php } ?>
			</select>
			<div class="esg-widget-separator"></div>
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
		$title = @$instance["ess_grid_title"];

		if (empty($grid_id))
			return (false);

		$base = new Essential_Grid_Base();
		$grids = Essential_Grid_Db::get_entity('grids')->get_grids_column('id', 'handle');
		if (!isset($grids[$grid_id]))
			return false;

		$grid_handle = $grids[$grid_id];

		//widget output
		$beforeWidget = $args["before_widget"];
		$afterWidget = $args["after_widget"];
		$beforeTitle = $args["before_title"];
		$afterTitle = $args["after_title"];

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		echo $beforeWidget;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		if (!empty($title)) echo $beforeTitle . esc_html($title) . $afterTitle;

		if ($base->is_shortcode_with_handle_exist($grid_handle)) {
			$eg_nav = new Essential_Grid_Navigation();
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- function return escaped HTML
			echo $eg_nav->output_navigation_left();
		}

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- These arguments contain arbitrary HTML and cannot be properly escaped
		echo $afterWidget;
	}
}
