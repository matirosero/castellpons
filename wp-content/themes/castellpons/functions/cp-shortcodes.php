<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function ct_register_shortcodes() {
    add_shortcode('caja-texto', 'ct_callout_box');
}
add_action( 'init', 'ct_register_shortcodes' );

function ct_callout_box( $atts, $content = null ) {
	return '<div class="callout">' . $content . '</div>';
}
