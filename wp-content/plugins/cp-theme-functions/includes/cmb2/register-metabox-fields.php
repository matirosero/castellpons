<?php

add_action( 'cmb2_admin_init', 'mro_cp_register_frontpage_metabox' );
function mro_cp_register_frontpage_metabox() {
	$prefix = 'mro_cp_frontpage_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Slider projects', 'cpf' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false, // Show field names on the left
		'show_on' => array( 'key' => 'front-page', 'value' => '' ),
	) );

	$cmb->add_field( array(
		'name'    => __( 'Slider projects', 'cpf' ),
		'desc'    => __( 'Drag projects from the left column to the right column to attach them to this post.', 'cpf' ),
		'id'      => $prefix . 'slider_projects',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'cp-project',
			), // override the get_posts args
		),
	) );
}


add_action( 'cmb2_admin_init', 'mro_cp_register_post_metabox' );
function mro_cp_register_post_metabox() {
	$prefix = 'mro_cp_post_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Extra information', 'cpf' ),
		'object_types' => array( 'post' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	$group_post_urls = $cmb->add_field( array(
		'id'          => $prefix . 'urls',
		'type'        => 'group',
		'description' => esc_html__( 'External links', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Link {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Link', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Link', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb->add_group_field( $group_post_urls, array(
		'name'       => esc_html__( 'Link Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text_medium',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb->add_group_field( $group_post_urls, array(
		'name' => esc_html__( 'Link URL', 'cmb2' ),
		// 'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	) );

	$cmb->add_field( array(
		'name'    => __( 'Related project', 'cpf' ),
		'desc'    => __( 'Drag a project from the left column to the right column to attach them to this post.<br />ONLY ONE PROJECT WILL BE LINKED.', 'cpf' ),
		'id'      => $prefix . 'attached_project',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'cp-project',
			), // override the get_posts args
		),
	) );


}

add_action( 'cmb2_admin_init', 'mro_cp_register_iconsbox_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cp_register_iconsbox_metabox() {
	$prefix = 'mro_cp_iconsbox_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Icons box', 'cpf' ),
		'object_types'  => array( 'page' ), // Post type
		'show_on'      	=> array( 
			'key' => 'page-template', 
			'value' => 'template-iconsbox.php' 
		),
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Box title', 'cpf' ),
		// 'desc'      => esc_html__( 'Location: town, city etc', 'cpf' ),
		'id'        => $prefix . 'title',
		'type'      => 'text',
		// 'column'  	=> true, // Display field value in the admin post-listing columns
	) );

	$group_field_id = $cmb->add_field( array(
		'id'          => $prefix . 'icon_group',
		'type'        => 'group',
		// 'description' => __( 'Generates reusable form entries', 'cpf' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Icon {#}', 'cpf' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Icon', 'cpf' ),
			'remove_button' => __( 'Remove Icon', 'cpf' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Icon', 'cpf' ),
		'id'   => 'icon',
		'type' => 'file',
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Description', 'cpf' ),
		// 'description' => 'Write a short description for this entry',
		'id'   => 'description',
		'type' => 'textarea_small',
	) );
}


add_action( 'cmb2_admin_init', 'mro_cp_register_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cp_register_page_metabox() {
	$prefix = 'mro_cp_page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Sidebar', 'cpf' ),
		'object_types'  => array( 'page' ), // Post type
		// 'show_on'      => array(
		// 	'id' => array( 975 ),
		// ), // Specific post IDs to display this metabox
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );

	$cmb->add_field( array(
		// 'name'    => esc_html__( 'Sidebar', 'cpf' ),
		'desc'    => esc_html__( 'This content goes in the narrow, right sidebar.', 'cpf' ),
		'id'      => $prefix . 'sidebar',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
}

add_action( 'cmb2_admin_init', 'mro_cp_register_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cp_register_project_metabox() {
	$prefix = 'mro_cp_project_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Project attributes', 'cpf' ),
		'object_types'  => array( 'cp-project' ), // Post type
		// 'show_on'      => array(
		// 	'id' => array( 975 ),
		// ), // Specific post IDs to display this metabox
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Location', 'cpf' ),
		'desc'      => esc_html__( 'Location: town, city etc', 'cpf' ),
		'id'        => $prefix . 'location',
		'type'      => 'text',
		'column'  	=> true, // Display field value in the admin post-listing columns
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Address', 'cpf' ),
		// 'desc' => esc_html__( 'field description (optional)', 'cpf' ),
		'id'   => $prefix . 'address',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Project date', 'cpf' ),
		'id'        => $prefix . 'dates',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Architects', 'cpf' ),
		'id'        => $prefix . 'firm',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Technical architect', 'cpf' ),
		'id'        => $prefix . 'tech_architect',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Engineer', 'cpf' ),
		'id'        => $prefix . 'engineer',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Project codirector', 'cpf' ),
		'id'        => $prefix . 'codirector',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Construction company', 'cpf' ),
		'id'        => $prefix . 'construction',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Promoters', 'cpf' ),
		'id'        => $prefix . 'promoters',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Collaborators', 'cpf' ),
		'id'        => $prefix . 'collaborators',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Material Execution Budget', 'cpf' ),
		'id'        => $prefix . 'pem',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb->add_field( array(
		'name'         => esc_html__( 'Gallery', 'cpf' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cpf' ),
		'id'           => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
}


add_action( 'cmb2_admin_init', 'mro_cp_register_office_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cp_register_office_metabox() {
	$prefix = 'mro_cp_office_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Address', 'cpf' ),
		'object_types'  => array( 'cp-office' ), // Post type
		// 'show_on'      => array(
		// 	'id' => array( 975 ),
		// ), // Specific post IDs to display this metabox
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Address', 'cpf' ),
		// 'desc' => esc_html__( 'field description (optional)', 'cpf' ),
		'id'   => 'post_content',
		'type' => 'textarea_small',
	) );

	$cmb->add_field( array(
		'name'      => esc_html__( 'Google Map', 'cpf' ),
		'id'        => $prefix . 'map',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );
}