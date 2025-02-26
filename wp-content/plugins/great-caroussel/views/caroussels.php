<script>



		jQuery(document).ready(function(){



			jQuery('#great-caroussels .remove').click(function(){

				var gc = jQuery(this).parent().parent('.great-caroussel');

				jQuery.post(ajaxurl, {action: 'remove_gc', id: jQuery(this).attr('rel'), _ajax_nonce: '<?php echo esc_attr(wp_create_nonce( "remove_gc" )); ?>' }, function(){

					jQuery(gc).remove();

				});

			});



		});



</script>



<h2>All great carrousels</h2>

<form action="" method="post" id="form_new_gc">

<?php wp_nonce_field( 'new_gc' ) ?>

<b>Add a new carrousel</b><br />

	<label>Name: </label><input type="text" name="name" /><br />

	<input type="submit" value="Add" class="button-primary" />

</form>



<div id="great-caroussels">

<?php



if(sizeof($caroussels) > 0)

{

	foreach($caroussels as $caroussel)

	{

		echo '<div class="great-caroussel"><form action="" method="post" class="gc_form">';

		wp_nonce_field( 'update_gc_'.$caroussel->id, "_wpnonce", true );

		echo '<label>Name : </label><input type="text" name="name" value="'.esc_html($caroussel->name).'" /><input type="hidden" name="id" value="'.(int)$caroussel->id.'" /> <br />';

		echo '<input type="image" src="'.esc_url(plugins_url( 'images/save.png', dirname(__FILE__))).'" title="Save" />	

		<a href="'.esc_url(admin_url()).'?page=great_caroussels&id='.(int)$caroussel->id.'" title="Edit this great caroussel"><img src="'.esc_url(plugins_url( '/images/contents.png', dirname(__FILE__))).'" class="action" /></a> <img title="Remove this great carrousel" class="remove action" rel="'.(int)$caroussel->id.'" src="'.esc_url(plugins_url( 'images/remove.png', dirname(__FILE__)) ).'" />

		Shortcode : <input type="text" value="[great-caroussel id='.(int)$caroussel->id.']" readonly onClick="this.select()" />

		</form>

		</div>';

	}

}

else

	echo 'No great caroussel found yet!';



?>

</div>



<h3><br />Need help? <a href="http://www.info-d-74.com" target="_blank">Click for support</a> <br/>

and like InfoD74 to discover my new plugins: <a href="https://www.facebook.com/infod74/" target="_blank"><img src="<?php echo esc_url(plugins_url( 'images/fb.png', dirname(__FILE__))) ?>" alt="" /></a></h3>