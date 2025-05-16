<?php
/**
 * The template for displaying Comments.
<<<<<<< HEAD
 */

=======
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
if ( post_password_required() )
	return;

if ( have_comments() || comments_open() ) {
	?>
	<section class="comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
<<<<<<< HEAD
			<h2 class="section_title comments_list_title">
				<?php 
					$post_comments = get_comments_number(); 
					echo esc_attr($post_comments); 
					echo (1 == $post_comments ? ' Comentario' : ' Comentarios');
				?>
			</h2>
=======
			<h2 class="section_title comments_list_title"><?php $post_comments = get_comments_number(); echo esc_attr($post_comments); ?> <?php echo (1==$post_comments ? esc_html__('Comment', 'sweet-dessert') : esc_html__('Comments', 'sweet-dessert')); ?></h2>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			<ul class="comments_list">
				<?php
				wp_list_comments( array('callback'=>'sweet_dessert_output_single_comment') );
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports( get_post_type(), 'comments' ) ) { ?>
<<<<<<< HEAD
				<p class="comments_closed"><?php esc_html_e( 'Los comentarios están cerrados.', 'sweet-dessert' ); ?></p>
=======
				<p class="comments_closed"><?php esc_html_e( 'Comments are closed.', 'sweet-dessert' ); ?></p>
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
		?>
		<div class="comments_form_wrap">
<<<<<<< HEAD
=======
			
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
			<div class="comments_form">
				<?php
				$form_style = esc_attr(sweet_dessert_get_theme_option('input_hover'));
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? ' aria-required="true"' : '' );
				$privacy_text = sweet_dessert_get_privacy_text();
<<<<<<< HEAD

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
=======
				$sweet_dessert_comments_args = apply_filters(	'sweet_dessert_filter_comment_form_args', array(
						// class of the 'form' tag
						'class_form' => 'comment-form sc_input_hover_' . esc_attr($form_style),
						// change the id of send button 
						'id_submit'=>'send_comment',
						// change the title of send button 
						'label_submit'=>esc_html__('Post Comment', 'sweet-dessert'),
						// change the title of the reply section
						'title_reply' => esc_html__('Add Comment', 'sweet-dessert'),
						'title_reply_before' => '<h2 id="reply-title" class="section_title comments_form_title">',
						'title_reply_after' => '</h2>',
						// remove "Logged in as"
						'logged_in_as' => '',
						// remove text before textarea
						'comment_notes_before' => '<p class="comments_notes">'.esc_html__('Your email address will not be published. Required fields are marked *', 'sweet-dessert').'</p>',
						// remove text after textarea
						'comment_notes_after' => '',
						// redefine your own textarea (the comment body)
						'fields'               => array(
							'author' => sweet_dessert_single_comments_field(
											array(
												'form_style'        => $form_style,
												'field_type'        => 'text',
												'field_req'         => true,
												'field_icon'        => 'icon-user',
												'field_value'       => isset($commenter['comment_author']) ? $commenter['comment_author'] : '',
												'field_name'        => 'author',
												'field_title'       => esc_attr__( 'Name', 'sweet-dessert' ),
												'field_placeholder' => esc_attr__( 'Name', 'sweet-dessert' ),
											)
									),
							'email'  => sweet_dessert_single_comments_field(
									 array(
										  'form_style'        => $form_style,
										  'field_type'        => 'text',
										  'field_req'         => $req,
										  'field_icon'        => 'icon-mail',
										  'field_value'       => isset( $sweet_dessert_commenter['comment_author_email'] ) ? $sweet_dessert_commenter['comment_author_email'] : '',
										  'field_name'        => 'email',
										  'field_title'       => esc_attr__( 'E-mail', 'sweet-dessert' ),
										  'field_placeholder' => esc_attr__( 'E-mail', 'sweet-dessert' ),
											)
										),
								),
							// redefine your own textarea (the comment body)
							'comment_field'        => sweet_dessert_single_comments_field(
									array(
										'form_style'        => $form_style,
										'field_type'        => 'textarea',
										'field_req'         => true,
										'field_icon'        => 'icon-feather',
										'field_value'       => '',
										'field_name'        => 'comment',
										'field_title'       => esc_attr__( 'Comment', 'sweet-dessert' ),
										'field_placeholder' => esc_attr__( 'Comment', 'sweet-dessert' ),
									)
							),
					 )
				);
				
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
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
