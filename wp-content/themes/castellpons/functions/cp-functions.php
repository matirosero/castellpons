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

// Add Character Counter to the Excerpt Meta Box
function excerpt_count_js(){
    if ('page' != get_post_type()) { ?>
        <script>

        (function($){

            $(document).ready(function(){

                if ( $('#postexcerpt').length ) {

                    var maxChar = 70;

                    $excerpt = $('#excerpt');

                    $("#postexcerpt .handlediv").after( '<div style="position:absolute;top:5px;right:80px;color:#666;">' +
                                                            '<small>Excerpt length: </small>' +
                                                            '<input type="text" value="0" maxlength="3" size="3" id="excerpt_counter" readonly="" style="background:#fff;" /> ' +
                                                            '<small>character(s). (' + maxChar + ' Characters MAX)</small>' +
                                                        '</div>'
                                                    );

                    $excerptCounter = $("#excerpt_counter");

                    $excerptCounter.val( $excerpt.val().length );

                    $excerpt.keyup( function() {

                        $excerptCounter.val( $excerpt.val().length );

                        var exColor = ( ( $excerptCounter.val() > maxChar ) ? 'red' : 'green' );

                        $excerptCounter.css( 'color', exColor );

                    });

                }

            });

         })(jQuery);

        </script>
    <?php }
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');


/**
 * Limit excerpt to a number of characters without cutting last word
 * 
 * @param string $excerpt
 * @return string
 */
function custom_short_excerpt($excerpt){
    $limit = 70;

    if (strlen($excerpt) > $limit) {
        return substr($excerpt, 0, strpos($excerpt, ' ', $limit));
    }

    return $excerpt;
}

add_filter('the_excerpt', 'custom_short_excerpt');

