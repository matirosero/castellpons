<?php

add_action( 'wp_ajax_nopriv_ajax_pagination', 'cp_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'cp_ajax_pagination' );

function cp_ajax_pagination() {
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