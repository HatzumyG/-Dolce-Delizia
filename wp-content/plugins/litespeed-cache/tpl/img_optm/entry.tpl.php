<?php
<<<<<<< HEAD

namespace LiteSpeed;

defined('WPINC') || exit;

$menu_list = array(
	'summary'		=> __('Image Optimization Summary', 'litespeed-cache'),
	'settings'		=> __('Image Optimization Settings', 'litespeed-cache'),
);


if ($this->_is_network_admin) {
	$menu_list = array(
		'network_settings' => __('Image Optimization Settings', 'litespeed-cache'),
	);
}

=======
namespace LiteSpeed;
defined( 'WPINC' ) || exit;

$menu_list = array(
	'summary'		=> __( 'Image Optimization Summary', 'litespeed-cache' ),
	'settings'		=> __( 'Image Optimization Settings', 'litespeed-cache' ),
) ;


if ( $this->_is_network_admin ) {
	$menu_list = array(
		'network_settings' => __( 'Image Optimization Settings', 'litespeed-cache' ),
	);
}


>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
?>

<div class="wrap">
	<h1 class="litespeed-h1">
<<<<<<< HEAD
		<?php echo __('LiteSpeed Cache Image Optimization', 'litespeed-cache'); ?>
	</h1>
	<span class="litespeed-desc">
		v<?php echo Core::VER; ?>
=======
		<?php echo __( 'LiteSpeed Cache Image Optimization', 'litespeed-cache' ) ; ?>
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
			require LSCWP_DIR . "tpl/img_optm/$tab.tpl.php";
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
			require LSCWP_DIR . "tpl/img_optm/$tab.tpl.php" ;
			echo "</div>" ;
		}

	?>
	</div>

</div>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
