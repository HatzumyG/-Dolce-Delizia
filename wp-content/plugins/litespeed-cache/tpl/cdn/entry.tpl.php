<?php
<<<<<<< HEAD

namespace LiteSpeed;

defined('WPINC') || exit;

$menu_list = array(
	'qc'		=> __('QUIC.cloud', 'litespeed-cache'),
	'cf'		=> __('Cloudflare', 'litespeed-cache'),
	'other'	=> __('Other Static CDN', 'litespeed-cache'),
);
=======
namespace LiteSpeed ;
defined( 'WPINC' ) || exit ;

$menu_list = array(
	'settings'			=> __( 'CDN Settings', 'litespeed-cache' ),
	'auto_setup'		=> __( 'QUIC.cloud CDN Setup', 'litespeed-cache' ),
	'manage'			=> __( 'Manage', 'litespeed-cache' ),
) ;
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244

?>

<div class="wrap">
	<h1 class="litespeed-h1">
<<<<<<< HEAD
		<?php echo __('LiteSpeed Cache CDN', 'litespeed-cache'); ?>
	</h1>
	<span class="litespeed-desc">
		v<?php echo Core::VER; ?>
=======
		<?php echo __( 'LiteSpeed Cache CDN', 'litespeed-cache' ) ; ?>
	</h1>
	<span class="litespeed-desc">
		v<?php echo Core::VER ; ?>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
	</span>
	<hr class="wp-header-end">
</div>

<div class="litespeed-wrap">
	<h2 class="litespeed-header nav-tab-wrapper">
<<<<<<< HEAD
		<?php
		$i = 1;
		foreach ($menu_list as $tab => $val) {
			$accesskey = $i <= 9 ? "litespeed-accesskey='$i'" : '';
			echo "<a class='litespeed-tab nav-tab' href='#$tab' data-litespeed-tab='$tab' $accesskey>$val</a>";
			$i++;
		}
		?>
	</h2>

	<div class="litespeed-body">
		<?php

		// include all tpl for faster UE
		foreach ($menu_list as $tab => $val) {
			echo "<div data-litespeed-layout='$tab'>";
			require LSCWP_DIR . "tpl/cdn/$tab.tpl.php";
			echo "</div>";
		}

		?>
	</div>

</div>
=======
	<?php
		$i = 1 ;
		foreach ($menu_list as $tab => $val){
			$accesskey = $i <= 9 ? "litespeed-accesskey='$i'" : '' ;
			echo "<a class='litespeed-tab nav-tab' href='#$tab' data-litespeed-tab='$tab' $accesskey>$val</a>" ;
			$i ++ ;
		}
	?>
	</h2>

	<div class="litespeed-body">
	<?php

		// include all tpl for faster UE
		foreach ($menu_list as $tab => $val) {
			echo "<div data-litespeed-layout='$tab'>" ;
			require LSCWP_DIR . "tpl/cdn/$tab.tpl.php" ;
			echo "</div>" ;
		}

	?>
	</div>

</div>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
