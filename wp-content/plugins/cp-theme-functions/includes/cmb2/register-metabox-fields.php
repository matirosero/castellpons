<?php


add_action( 'cmb2_admin_init', 'mro_cp_register_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cp_register_page_metabox() {
	$prefix = 'mro_cp_page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
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

	$cmb_demo->add_field( array(
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
	$cmb_demo = new_cmb2_box( array(
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

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Location', 'cpf' ),
		'desc'      => esc_html__( 'Location: town, city etc', 'cpf' ),
		'id'        => $prefix . 'location',
		'type'      => 'text',
		'column'  	=> true, // Display field value in the admin post-listing columns
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Address', 'cpf' ),
		// 'desc' => esc_html__( 'field description (optional)', 'cpf' ),
		'id'   => $prefix . 'address',
		'type' => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Project date', 'cpf' ),
		'id'        => $prefix . 'dates',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Firm', 'cpf' ),
		'id'        => $prefix . 'firm',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Technical architect', 'cpf' ),
		'id'        => $prefix . 'tech_architect',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Engineer', 'cpf' ),
		'id'        => $prefix . 'engineer',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Project codirector', 'cpf' ),
		'id'        => $prefix . 'codirector',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Construction company', 'cpf' ),
		'id'        => $prefix . 'construction',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Promoters', 'cpf' ),
		'id'        => $prefix . 'promoters',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Collaborators', 'cpf' ),
		'id'        => $prefix . 'collaborators',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'      => esc_html__( 'Material Execution Budget', 'cpf' ),
		'id'        => $prefix . 'pem',
		'type'      => 'text',
		// 'column'  	=> true, 
	) );

	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Gallery', 'cpf' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cpf' ),
		'id'           => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
}