<?php

add_action( 'wp_ajax_nopriv_ajax_filter_pagination', 'cp_ajax_filter_pagination' );
add_action( 'wp_ajax_ajax_filter_pagination', 'cp_ajax_filter_pagination' );

function cp_ajax_filter_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    // var_dump($query_vars);

    $query_vars['paged'] = $_POST['page'];

    // var_dump($query_vars);


    $posts = new WP_Query( $query_vars );
    $GLOBALS['wp_query'] = $posts;

    add_filter( 'editor_max_image_size', 'my_image_size_override' );

    if( ! $posts->have_posts() ) { 
        get_template_part( 'parts/content', 'missing' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post();
            get_template_part( 'parts/loop', 'archive' );
        }
    }
    remove_filter( 'editor_max_image_size', 'my_image_size_override' );

    joints_page_navi();

    die();
}

function my_image_size_override() {
    return array( 825, 510 );
}

function cp_tax_filter() {
	global $wp_query;

	if ( is_post_type_archive( 'cp-project' ) ) {
		$tax = 'cp-type';
	} else {
		$tax = 'category';
	}

	$terms = get_terms($tax);

	//TODO: TODOS TODAS

	echo '<ul class="filter-menu menu align-center">
		<li class="is-active"><a data-slug="todos" href="">Todos</a></li>';

	foreach ($terms as $term) {
		echo '<li><a data-slug="' . $term->slug . '" data-id="' . $term->term_id . '" href="' . get_term_link( $term->term_id, $tax ) . '">' . $term->name . '</a></li>';
	}

	echo '</ul>';

	// return $return;
}