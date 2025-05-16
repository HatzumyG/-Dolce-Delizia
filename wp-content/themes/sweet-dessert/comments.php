<?php
/**
 * The template for displaying Comments.
 */

if ( post_password_required() )
	return;

if ( have_comments() || comments_open() ) {
	?>
	<section class="comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
			<h2 class="section_title comments_list_title">
				<?php 
					$post_comments = get_comments_number(); 
					echo esc_attr($post_comments); 
					echo (1 == $post_comments ? ' Comentario' : ' Comentarios');
				?>
			</h2>
			<ul class="comments_list">
				<?php
				wp_list_comments( array('callback'=>'sweet_dessert_output_single_comment') );
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports( get_post_type(), 'comments' ) ) { ?>
				<p class="comments_closed"><?php esc_html_e( 'Los comentarios están cerrados.', 'sweet-dessert' ); ?></p>
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
		?>
		<div class="comments_form_wrap">
			<div class="comments_form">
				<?php
				$form_style = esc_attr(sweet_dessert_get_theme_option('input_hover'));
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? ' aria-required="true"' : '' );
				$privacy_text = sweet_dessert_get_privacy_text();

				$sweet_dessert_comments_args = apply_filters( 'sweet_dessert_filter_comment_form_args', array(
					'class_form'         => 'comment-form sc_input_hover_' . esc_attr($form_style),
					'id_submit'          => 'send_comment',
					'label_submit'       => esc_html__('Publicar Comentario', 'sweet-dessert'),
					'title_reply'        => esc_html__('Añadir Comentario', 'sweet-dessert'),
					'title_reply_before' => '<h2 id="reply-title" class="section_title comments_form_title">',
					'title_reply_after'  => '</h2>',
					'logged_in_as'       => '',
					'comment_notes_before' => '<p class="comments_notes">'.esc_html__('Tu correo electrónico no será publicado. Los campos obligatorios están marcados con *', 'sweet-dessert').'</p>',
					'comment_notes_after'  => '',
					'fields'            => array(
						'author' => sweet_dessert_single_comments_field(array(
							'form_style'        => $form_style,
							'field_type'        => 'text',
							'field_req'         => true,
							'field_icon'        => 'icon-user',
							'field_value'       => isset($commenter['comment_author']) ? $commenter['comment_author'] : '',
							'field_name'        => 'author',
							'field_title'       => esc_attr__( 'Nombre', 'sweet-dessert' ),
							'field_placeholder' => esc_attr__( 'Nombre', 'sweet-dessert' ),
						)),
						'email' => sweet_dessert_single_comments_field(array(
							'form_style'        => $form_style,
							'field_type'        => 'text',
							'field_req'         => $req,
							'field_icon'        => 'icon-mail',
							'field_value'       => isset($commenter['comment_author_email']) ? $commenter['comment_author_email'] : '',
							'field_name'        => 'email',
							'field_title'       => esc_attr__( 'Correo electrónico', 'sweet-dessert' ),
							'field_placeholder' => esc_attr__( 'Correo electrónico', 'sweet-dessert' ),
						)),
					),
					'comment_field' => sweet_dessert_single_comments_field(array(
						'form_style'        => $form_style,
						'field_type'        => 'textarea',
						'field_req'         => true,
						'field_icon'        => 'icon-feather',
						'field_value'       => '',
						'field_name'        => 'comment',
						'field_title'       => esc_attr__( 'Comentario', 'sweet-dessert' ),
						'field_placeholder' => esc_attr__( 'Comentario', 'sweet-dessert' ),
					)),
				));
				
				comment_form($sweet_dessert_comments_args);
				?>
			</div>
		</div><!-- /.comments_form_wrap -->
	<?php 
	}
	?>	
	</section><!-- /.comments_wrap -->
<?php 
}
?>
