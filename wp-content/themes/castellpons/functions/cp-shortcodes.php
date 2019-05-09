<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function ct_register_shortcodes() {
    add_shortcode('caja-texto', 'ct_callout_box_shortcode');
    add_shortcode('oficinas', 'ct_offices_shortcode');
}
add_action( 'init', 'ct_register_shortcodes' );

function ct_callout_box_shortcode( $atts, $content = null ) {
	return '<div class="callout">' . $content . '</div>';
}

function ct_offices_shortcode( $atts ) {
	global $wp_query,
        $post;

    $return = '';

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		// Type & Status Parameters
		'post_type'   => 'cp-office',
		'post_status' => 'publish',

		// Order & Orderby Parameters
		'order'               => 'ASC',
		'orderby'             => 'date',

		// Pagination Parameters
		'posts_per_page'         => -1,

		// Parameters relating to caching
		'no_found_rows'          => false,
		'cache_results'          => true,
		'update_post_term_cache' => true,
		'update_post_meta_cache' => true,

	);
    
    $query = new WP_Query( $args );

	if( ! $query->have_posts() ) :
	    return false;
	else : 

		$return .= '<ul class="offices">';

		$i = 0;
		$count = $query->post_count; 


		while( $query->have_posts() ) : $query->the_post();

			$aos = '';
			if ( $i > 0 ) {
				$aos = ' data-aos="fade-up"';
			}

	        $return .= '<li class="location"'.$aos.'>
	        	<h3 class="location-city">'.get_the_title().'</h3>
	        	<p class="location-address">'.wpautop( get_the_content() ).'</p>
	        	<div class="location-map">';



			$return .= '</div>
	        	</li>';

	        $i++;

	    endwhile;

	    $return .=  '</ul>';

	    wp_reset_postdata();

	endif;
    
	
	return $return;
}