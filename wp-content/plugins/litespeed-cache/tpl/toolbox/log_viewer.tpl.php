<?php

namespace LiteSpeed;

defined('WPINC') || exit;

$logs =
	array(
		array(
			'name' => 'debug',
<<<<<<< HEAD
			'label' => __('Debug Log', 'litespeed-cache'),
=======
			'label' => esc_html__('Debug Log', 'litespeed-cache'),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			'accesskey' => 'A',
		),
		array(
			'name' => 'purge',
<<<<<<< HEAD
			'label' => __('Purge Log', 'litespeed-cache'),
=======
			'label' => esc_html__('Purge Log', 'litespeed-cache'),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			'accesskey' => 'B',
		),
		array(
			'name' => 'crawler',
<<<<<<< HEAD
			'label' => __('Crawler Log', 'litespeed-cache'),
=======
			'label' => esc_html__('Crawler Log', 'litespeed-cache'),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			'accesskey' => 'C',
		),
	);

/**
 * Return a subnav button (subtab)
 * @since  4.7
 */
function subnav_link($item)
{
	$class = 'button ';
	$subtab = '';

	if (!isset($item['url'])) {
		$class .= 'button-secondary';
		$subtab_name = "{$item['name']}_log";
		$subtab = "data-litespeed-subtab='{$subtab_name}'";
		$url = "#{$subtab_name}";
	} else {
		$class .= 'button-primary';
		$url = $item['url'];
	}

	$accesskey =
		isset($item['accesskey'])
		? "litespeed-accesskey='{$item['accesskey']}'"
		: '';
	$label = isset($item['label']) ? $item['label'] : $item['name'];

<<<<<<< HEAD
	$on_click = isset($item['onClick']) ? ' onClick="' . $item['onClick'].'"' : '';

	return "<a href='{$url}' class='{$class}' {$subtab} {$accesskey} {$on_click}>{$label}</a>";
=======
	return "<a href='{$url}' class='{$class}' {$subtab} {$accesskey}>{$label}</a>";
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
}

/**
 * Print a button to clear all logs
 * @since  4.7
 */
function clear_logs_link($accesskey = null)
{
	$item =
		array(
<<<<<<< HEAD
			'label' => __('Clear Logs', 'litespeed-cache'),
=======
			'label' => esc_html__('Clear Logs', 'litespeed-cache'),
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			'url' => Utility::build_url(Router::ACTION_DEBUG2, Debug2::TYPE_CLEAR_LOG),
		);
	if (null !== $accesskey) {
		$item['accesskey'] = $accesskey;
	}
	echo subnav_link($item);
}

<<<<<<< HEAD
/**
 * Print a button to copy current log
 * @since  7.0
 */
function copy_logs_link($id_to_copy)
{
	$item = array(
			'name' => 'copy_links',
			'label' => __('Copy Log', 'litespeed-cache'),
			'cssClass' => 'litespeed-info-button',
			'onClick' => "litespeed_copy_to_clipboard('".$id_to_copy."')"
		);
	return subnav_link($item);
}

=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
$subnav_links = array();
$log_views = array();

foreach ($logs as $log) {
	$subnav_links[] = subnav_link($log);

	$file = $this->cls('Debug2')->path($log['name']);
	$lines = File::count_lines($file);
<<<<<<< HEAD
	$max_lines = apply_filters('litespeed_debug_show_max_lines', 1000);
	$start = $lines > $max_lines ? $lines - $max_lines : 0;
	$lines = File::read($file, $start);
	$lines = $lines ? trim(implode("\n", $lines)) : '';
	
	$log_body_id = 'litespeed-log-' . $log['name'];

	$log_views[] =
		"<div class='litespeed-log-view-wrapper' data-litespeed-sublayout='{$log['name']}_log'>"
		. "<h3 class='litespeed-title'>{$log['label']}" . copy_logs_link($log_body_id) ."</h3>"
		. '<div class="litespeed-log-body" id="' . $log_body_id . '">'
=======
	$start = $lines > 1000 ? $lines - 1000 : 0;
	$lines = File::read($file, $start);
	$lines = $lines ? trim(implode("\n", $lines)) : '';

	$log_views[] =
		"<div class='litespeed-log-view-wrapper' data-litespeed-sublayout='{$log['name']}_log'>"
		. "<h3 class='litespeed-title'>{$log['label']}</h3>"
		. '<div class="litespeed-log-body">'
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
		. nl2br(htmlspecialchars($lines))
		. '</div>'
		. '</div>';
}
?>

<h3 class="litespeed-title">
<<<<<<< HEAD
	<?php _e('LiteSpeed Logs', 'litespeed-cache'); ?>
=======
	<?php esc_html_e('LiteSpeed Logs', 'litespeed-cache'); ?>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	<?php Doc::learn_more('https://docs.litespeedtech.com/lscache/lscwp/toolbox/#log-view-tab'); ?>
</h3>

<div class="litespeed-log-subnav-wrapper">
	<?php echo implode("\n", $subnav_links); ?>
	<?php clear_logs_link('D'); ?>
</div>

<?php echo implode("\n", $log_views); ?>

<?php
clear_logs_link();
