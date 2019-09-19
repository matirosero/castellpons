<?php

add_action( 'pre_get_posts', 'custom_post_type_archive' );

function custom_post_type_archive( $query ) {

if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'cp-project' ) ) {

        $taxquery = array(
	        array(
	            'taxonomy' => 'cp-type',
	            'field'    => 'slug',
	            'terms'    => array( 'destacats' ),
	        )
	    );

	    $query->set( 'tax_query', $taxquery );
		}

}