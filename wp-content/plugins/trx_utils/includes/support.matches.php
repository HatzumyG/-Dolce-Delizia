<?php
/*
 * Support for the Matches and Players
 */



// Register custom post type
if (!function_exists('trx_utils_support_matches_post_type')) {
	add_action( 'trx_utils_custom_post_type', 'trx_utils_support_matches_post_type', 10, 2 );
	function trx_utils_support_matches_post_type($name, $args=false) {
		if ($name=='matches') {
			if ($args===false) {
				$args = array(
					'label'               => esc_html__( 'Matches', 'trx_utils' ),
					'description'         => esc_html__( 'Matches Description', 'trx_utils' ),
					'labels'              => array(
						'name'                => esc_html__( 'Matches', 'trx_utils' ),
						'singular_name'       => esc_html__( 'Matches', 'trx_utils' ),
						'menu_name'           => esc_html__( 'Matches', 'trx_utils' ),
						'parent_item_colon'   => esc_html__( 'Parent Item:', 'trx_utils' ),
						'all_items'           => esc_html__( 'All Matches', 'trx_utils' ),
						'view_item'           => esc_html__( 'View Item', 'trx_utils' ),
						'add_new_item'        => esc_html__( 'Add New Match', 'trx_utils' ),
						'add_new'             => esc_html__( 'Add New', 'trx_utils' ),
						'edit_item'           => esc_html__( 'Edit Item', 'trx_utils' ),
						'update_item'         => esc_html__( 'Update Item', 'trx_utils' ),
						'search_items'        => esc_html__( 'Search Item', 'trx_utils' ),
						'not_found'           => esc_html__( 'Not found', 'trx_utils' ),
						'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'trx_utils' ),
					),
					'supports'            => array( 'title', 'excerpt', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields'),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'menu_icon'			  => 'dashicons-awards',
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => '52.9',
					'can_export'          => true,
					'has_archive'         => false,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'query_var'           => true,
					'capability_type'     => 'page',
					'rewrite'             => true
					);
			}
			register_post_type( $name, $args );
			trx_utils_add_rewrite_rules($name);

		} else if ($name=='players') {
			if ($args===false) {
				$args = array(
					'label'               => esc_html__( 'Players', 'trx_utils' ),
					'description'         => esc_html__( 'Players Description', 'trx_utils' ),
					'labels'              => array(
						'name'                => esc_html__( 'Players', 'trx_utils' ),
						'singular_name'       => esc_html__( 'Players', 'trx_utils' ),
						'menu_name'           => esc_html__( 'Players', 'trx_utils' ),
						'parent_item_colon'   => esc_html__( 'Parent Item:', 'trx_utils' ),
						'all_items'           => esc_html__( 'All Players', 'trx_utils' ),
						'view_item'           => esc_html__( 'View Item', 'trx_utils' ),
						'add_new_item'        => esc_html__( 'Add New Player', 'trx_utils' ),
						'add_new'             => esc_html__( 'Add New', 'trx_utils' ),
						'edit_item'           => esc_html__( 'Edit Item', 'trx_utils' ),
						'update_item'         => esc_html__( 'Update Item', 'trx_utils' ),
						'search_items'        => esc_html__( 'Search Item', 'trx_utils' ),
						'not_found'           => esc_html__( 'Not found', 'trx_utils' ),
						'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'trx_utils' ),
					),
					'supports'            => array( 'title', 'excerpt', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields'),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'menu_icon'			  => 'dashicons-groups',
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'show_in_rest' 		  => true,
					'menu_position'       => '52.8',
					'can_export'          => true,
					'has_archive'         => false,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'query_var'           => true,
					'capability_type'     => 'page',
					'rewrite'             => true
					);
			}
			register_post_type( $name, $args );
			trx_utils_add_rewrite_rules($name);
		}
	}
}
		

// Register custom taxonomy
if (!function_exists('trx_utils_support_matches_taxonomy')) {
	add_action( 'trx_utils_custom_taxonomy', 'trx_utils_support_matches_taxonomy', 10, 2 );
	function trx_utils_support_matches_taxonomy($name, $args=false) {
		if ($name=='matches_group') {
			if ($args===false) {
				$args = array(
					'post_type' 		=> 'matches',
					'hierarchical'      => true,
					'labels'            => array(
						'name'              => esc_html__( 'Matches Group', 'trx_utils' ),
						'singular_name'     => esc_html__( 'Group', 'trx_utils' ),
						'search_items'      => esc_html__( 'Search Groups', 'trx_utils' ),
						'all_items'         => esc_html__( 'All Groups', 'trx_utils' ),
						'parent_item'       => esc_html__( 'Parent Group', 'trx_utils' ),
						'parent_item_colon' => esc_html__( 'Parent Group:', 'trx_utils' ),
						'edit_item'         => esc_html__( 'Edit Group', 'trx_utils' ),
						'update_item'       => esc_html__( 'Update Group', 'trx_utils' ),
						'add_new_item'      => esc_html__( 'Add New Group', 'trx_utils' ),
						'new_item_name'     => esc_html__( 'New Group Name', 'trx_utils' ),
						'menu_name'         => esc_html__( 'Categories', 'trx_utils' ),
					),
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'matches_group' ),
					);
			}
			register_taxonomy( $name, $args['post_type'], $args);

		} else if ($name=='players_group') {
			if ($args===false) {
				$args = array(
					'post_type' 		=> 'players',
					'hierarchical'      => true,
					'labels'            => array(
						'name'              => esc_html__( 'Players Group', 'trx_utils' ),
						'singular_name'     => esc_html__( 'Group', 'trx_utils' ),
						'search_items'      => esc_html__( 'Search Groups', 'trx_utils' ),
						'all_items'         => esc_html__( 'All Groups', 'trx_utils' ),
						'parent_item'       => esc_html__( 'Parent Group', 'trx_utils' ),
						'parent_item_colon' => esc_html__( 'Parent Group:', 'trx_utils' ),
						'edit_item'         => esc_html__( 'Edit Group', 'trx_utils' ),
						'update_item'       => esc_html__( 'Update Group', 'trx_utils' ),
						'add_new_item'      => esc_html__( 'Add New Group', 'trx_utils' ),
						'new_item_name'     => esc_html__( 'New Group Name', 'trx_utils' ),
						'menu_name'         => esc_html__( 'Categories', 'trx_utils' ),
					),
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'players_group' ),
					);
			}
			register_taxonomy( $name, $args['post_type'], $args);
		}
	}
}
?>