<?php
/*======================/Create post type - star /=============================*/
function prefix_register_all()
{
	/* create post type column -----Start ---- */
	register_post_type(
		'column',
		array(
			'labels'        => array(
				'name'               => __('column', 'text_domain'),
				'singular_name'      => __('column', 'text_domain'),
				'menu_name'          => __('Column', 'text_domain'),
				'name_admin_bar'     => __('column', 'text_domain'),
				'all_items'          => __('All Items', 'text_domain'),
				'add_new'            => _x('Add New', 'column', 'text_domain'),
				'add_new_item'       => __('Add New Item', 'text_domain'),
				'edit_item'          => __('Edit Item', 'text_domain'),
				'new_item'           => __('New Item', 'text_domain'),
				'view_item'          => __('View Item', 'text_domain'),
				'search_items'       => __('Search Items', 'text_domain'),
				'not_found'          => __('No items found.', 'text_domain'),
				'not_found_in_trash' => __('No items found in Trash.', 'text_domain'),
				'parent_item_colon'  => __('Parent Items:', 'text_domain'),
			),
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'tags',
				'excerpt',
				'custom-fields',
			),
			'taxonomies'    => array(
				'column-category',
				'post_tag',
				'column-author'
			),
			'has_archive'   => true,
			'menu_icon'   => 'dashicons-format-chat',
			'rewrite'       => array(
				'slug' => 'column',
			),
		)
	);

	register_taxonomy(
		'column-category',
		array(
			'column',
		),
		array(
			'labels'            => array(
				'name'              => _x('Category Column', 'Column', 'text_domain'),
				'singular_name'     => _x('Category Column', 'Column', 'text_domain'),
				'menu_name'         => __('Category Column', 'text_domain'),
				'all_items'         => __('All Category Column', 'text_domain'),
				'edit_item'         => __('Edit Category Column', 'text_domain'),
				'view_item'         => __('View Category Column', 'text_domain'),
				'update_item'       => __('Update Category Column', 'text_domain'),
				'add_new_item'      => __('Add New Category Column', 'text_domain'),
				'new_item_name'     => __('New Category Name Column', 'text_domain'),
				'parent_item'       => __('Parent Category Column', 'text_domain'),
				'parent_item_colon' => __('Parent Category Column:', 'text_domain'),
				'search_items'      => __('Search Category Column', 'text_domain'),
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'column-category',
			),
		)
	);

	register_taxonomy(
		'column-author',
		array(
			'column',
		),
		array(
			'labels'            => array(
				'name'              => _x('Author Column', 'Column', 'text_domain'),
				'singular_name'     => _x('Author Column', 'Column', 'text_domain'),
				'menu_name'         => __('Author Column', 'text_domain'),
				'all_items'         => __('All Author Column', 'text_domain'),
				'edit_item'         => __('Edit Author Column', 'text_domain'),
				'view_item'         => __('View Author Column', 'text_domain'),
				'update_item'       => __('Update Author Column', 'text_domain'),
				'add_new_item'      => __('Add New Author Column', 'text_domain'),
				'new_item_name'     => __('New Category Name Column', 'text_domain'),
				'parent_item'       => __('Parent Author Column', 'text_domain'),
				'parent_item_colon' => __('Parent Author Column:', 'text_domain'),
				'search_items'      => __('Search Author Column', 'text_domain'),
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'column-author',
			),
		)
	);
	/* create post type column -----End ---- */
}

add_action('init', 'prefix_register_all', 0);

/* @xai chung*/
function prefix_flush_rewrite_rules()
{
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'prefix_flush_rewrite_rules');

/*======================/Create post type - end /=============================*/

/* change color for icon menu admin */

function replace_admin_menu_icons_css() {
    ?>
    <style>
		#adminmenu #menu-posts-column div.wp-menu-image::before
		 	{
    	color: yellow
			}
    </style>
 <?php
}

add_action( 'admin_head', 'replace_admin_menu_icons_css' );

?>