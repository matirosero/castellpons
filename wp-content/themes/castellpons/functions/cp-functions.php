<?php

function cp_content_filter($content) {
   echo do_shortcode( wpautop( $content ) );
}

add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_post_type_archive( 'cp-project' ) ) {
        $title = post_type_archive_title( '' );
    }

    return $title;

});