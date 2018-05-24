<?php

add_action( 'wp_ajax_nopriv_ajax_filter_pagination', 'cp_ajax_filter_pagination' );
add_action( 'wp_ajax_ajax_filter_pagination', 'cp_ajax_filter_pagination' );

function cp_ajax_filter_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    // var_dump($query_vars);
    // var_dump( $_POST['taxID'] );
    // var_dump( $_POST['page'] );
    // var_dump($_POST['query_vars']);

    if ( isset( $_POST['page'] ) ) {
    	$query_vars['paged'] = $_POST['page'];
    }

    if ( isset( $_POST['taxID'] ) && isset( $_POST['taxonomy'] ) ) {

    	$query_vars['tax_query'] = array(
			array(
				'taxonomy' => $_POST['taxonomy'],
				'field'    => 'id',
				'terms'    => $_POST['taxID'],
			),
		);
    }


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

            if ( is_post_type_archive( 'cp-project' ) ) {
				get_template_part( 'parts/loop', 'project-grid' );
			} else {
				get_template_part( 'parts/loop', 'archive' );
			}

        }
    }
    remove_filter( 'editor_max_image_size', 'my_image_size_override' );

    joints_page_navi();

    die();
}

function my_image_size_override() {
    return array( 825, 510 );
}

function cp_tax_filter($current = 'all') {
	global $wp_query;

	if ( is_post_type_archive( 'cp-project' ) ) {
		$tax = 'cp-type';
	} else {
		$tax = 'category';
	}

	$terms = get_terms($tax);

	//TODO: TODOS TODAS

	if ( $current == 'all' ) {
		echo '<ul class="filter-menu menu align-center">
		<li class="is-active"><a data-slug="todos" href="#">Todos</a></li>';
	} else {
		echo '<ul class="filter-menu menu align-center">
		<li><a data-slug="todos" href="#">Todos</a></li>';
	}

	foreach ($terms as $term) {

		if ( $current == $term->term_id ) {
			$li_class = 'is-active ' . $term->slug;
		} else {
			$li_class = $term->slug;
		}

		echo '<li class="' . $li_class . '"><a data-taxonomy="' . $tax . '" data-slug="' . $term->slug . '" data-id="' . $term->term_id . '" href="' . get_term_link( $term->term_id, $tax ) . '">' . $term->name . '</a></li>';
	}

	echo '</ul>';

	// return $return;
}