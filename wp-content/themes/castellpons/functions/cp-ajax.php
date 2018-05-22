<?php

add_action( 'wp_ajax_nopriv_ajax_pagination', 'cp_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'cp_ajax_pagination' );

function cp_ajax_pagination() {
    echo get_bloginfo( 'title' );
    die();
}