<?php
/* custom post-type for storing reported locations

*/

function dmap_locations() {
	// creating (registering) the custom type
	register_post_type( 'locations', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Locations', 'dmaptheme'), /* This is the Title of the Group */
			'singular_name' => __('Location', 'dmaptheme'), /* This is the individual type */
			'all_items' => __('All Locations', 'dmaptheme'), /* the all items menu item */
			'add_new' => __('Add New Location', 'dmaptheme'), /* The add new menu item */
			'add_new_item' => __('Add New Location', 'dmaptheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'dmaptheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Location', 'dmaptheme'), /* Edit Display Title */
			'new_item' => __('New Location', 'dmaptheme'), /* New Display Title */
			'view_item' => __('View Location', 'dmaptheme'), /* View Display Title */
			'search_items' => __('Search Locations', 'dmaptheme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'dmaptheme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'dmaptheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Dmap Locations', 'dmaptheme' ), /* Custom Type Description */

			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-location-alt', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'locations', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	); /* end of register post type */


}
	// adding the function to the Wordpress init
	add_action( 'init', 'dmap_locations');

	// now let's add custom tags (these act like categories)
    register_taxonomy( 'local_authority',
    	array('locations'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Local Authorities', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Local Authority', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Local Authorities', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Local Authorities', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Local Authority', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Local Authority:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Local Authority', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Local Authority', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Local Authority', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Local Authority Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );

 register_taxonomy( 'problem_type',
    	array('locations'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Problem Types', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Problem Type', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Problem Types', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Problem Types', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Type', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Type:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Problem Type', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Problem Type', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Problem Type', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Problem Type Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'problem-type' ),
    	)
    );


    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */


?>
