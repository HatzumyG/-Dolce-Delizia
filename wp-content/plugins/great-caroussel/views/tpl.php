	<div id="caroussel-<?php echo (int)$caroussel->id ?>" class="great_caroussel" style="width: 100%;">

		<div class="rotator" rel="<?php echo (int)sizeof($contents) ?>" style="transform: rotate(0deg)">



	<?php



		foreach($contents as $i => $content)

		{

			echo '<div class="content">'.wp_kses_post($content->content).'</div>';

		}



	?>



		</div>

		<a href="#" class="prev"><img src="<?php echo esc_url(plugins_url( 'images/back.png', dirname(__FILE__))) ?>" /></a>

		<a href="#" class="next"><img src="<?php echo esc_url(plugins_url( 'images/forward.png', dirname(__FILE__))) ?>" /></a>

	</div>

	

</body>

</html>