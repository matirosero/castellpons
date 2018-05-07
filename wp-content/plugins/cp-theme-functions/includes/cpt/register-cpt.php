<?php

/**
 * Set up post types.
 *
 * @since 0.1.0
 */

/*
 * Projects
 */

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function mro_cp_register_projects() {

	$labels = array(
		'name'               => __( 'Projects', 'cpf' ),
		'singular_name'      => __( 'Project', 'cpf' ),
		'add_new'            => _x( 'Add New Project', 'cpf', 'cpf' ),
		'add_new_item'       => __( 'Add New Project', 'cpf' ),
		'edit_item'          => __( 'Edit Project', 'cpf' ),
		'new_item'           => __( 'New Project', 'cpf' ),
		'view_item'          => __( 'View Project', 'cpf' ),
		'search_items'       => __( 'Search Projects', 'cpf' ),
		'not_found'          => __( 'No Projects found', 'cpf' ),
		'not_found_in_trash' => __( 'No Projects found in Trash', 'cpf' ),
		'parent_item_colon'  => __( 'Parent Project:', 'cpf' ),
		'menu_name'          => __( 'Projects', 'cpf' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('cp-type'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'projectes' ),
		'show_in_rest'		=> true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
		'template' => array(
	            array( 'core/image', array(
	                'align' => 'left',
	            ) 
	        ),
	            array( 'core/heading', array(
	                'placeholder' => 'Add Author...',
	            ) 
	        ),
	            array( 'core/paragraph', array(
	                'placeholder' => 'Add Description...',
	            ) 
	        ),
	            array( 'core/gallery', array(
	                'placeholder' => 'Add Gallery...',
	            ) 
	        ),
	    ),
	);

	register_post_type( 'cp-project', $args );
}

add_action( 'init', 'mro_cp_register_projects' );


/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function mro_cp_register_projecttax() {

	$labels = array(
		'name'                  => _x( 'Project Types', 'Taxonomy plural name', 'text-domain' ),
		'singular_name'         => _x( 'Project Type', 'Taxonomy singular name', 'text-domain' ),
		'search_items'          => __( 'Search Project Types', 'text-domain' ),
		'popular_items'         => __( 'Popular Project Types', 'text-domain' ),
		'all_items'             => __( 'All Project Types', 'text-domain' ),
		'parent_item'           => __( 'Parent Project Type', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Project Type', 'text-domain' ),
		'edit_item'             => __( 'Edit Project Type', 'text-domain' ),
		'update_item'           => __( 'Update Project Type', 'text-domain' ),
		'add_new_item'          => __( 'Add New Project Type', 'text-domain' ),
		'new_item_name'         => __( 'New Project Type Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Project Types', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used Project Types', 'text-domain' ),
		'menu_name'             => __( 'Project Type', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'cp-type', array( 'cp-project' ), $args );
}

add_action( 'init', 'mro_cp_register_projecttax' );