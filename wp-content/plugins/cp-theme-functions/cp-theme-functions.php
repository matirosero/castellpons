<?php
/*
Plugin Name: C+P Theme Functions
Plugin URI: https://github.com/matirosero/castellpons
Description: Custom functions for the C+P website.
Version: 0.1
Author: Mat Rosero
Author URI: https://www.matilderosero.com/
This plugin is released under the GPLv2 license. The images packaged with this plugin are the property of their respective owners, and do not, necessarily, inherit the GPLv2 license.
*/


/**
 * Load plugin textdomain.
 *
 * @since 0.1.0
 */
function cpf_load_textdomain() {
	load_plugin_textdomain( 'cpf', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'cpf_load_textdomain' );


/**
 * Get the CMB2 bootstrap!
 *
 * @since 0.1.0
 */
if ( file_exists( __DIR__ . '/vendor/cmb2/init.php' ) ) {
  	require_once __DIR__ . '/vendor/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/vendor/CMB2/init.php' ) ) {
  	require_once __DIR__ . '/vendor/CMB2/init.php';
}





/**
 * Post types.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/cpt/register-cpt.php' );
// require_once( dirname( __FILE__ ) . '/includes/cpt/register-tax.php' );


/**
 * Custom fields.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/cmb2/register-metabox-fields.php' );


/**
 * Enqueue scripts.
 *
 * @since 0.1.0
 */
// require_once( dirname( __FILE__ ) . '/includes/enqueue.php' );


/**
 * Admin tweaks.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/helpers/admin-tweaks.php' );