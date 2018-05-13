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
function cp_excerpt_count_js(){
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
add_action( 'admin_head-post.php', 'cp_excerpt_count_js');
add_action( 'admin_head-post-new.php', 'cp_excerpt_count_js');


/**
 * Limit excerpt to a number of characters without cutting last word
 *
 * @param string $excerpt
 * @return string
 */
function cp_custom_short_excerpt($excerpt){
    $limit = 70;

    if (strlen($excerpt) > $limit) {
        return substr($excerpt, 0, strpos($excerpt, ' ', $limit));
    }

    return $excerpt;
}

add_filter('the_excerpt', 'cp_custom_short_excerpt');



add_action('nav_menu_css_class', 'cp_add_current_nav_class', 10, 2 );

function cp_add_current_nav_class($classes, $item) {

    // Getting the current post details
    global $post;

    // Getting the post type of the current post
    $current_post_type = get_post_type_object(get_post_type($post->ID));
    $current_post_type_slug = $current_post_type->rewrite['slug'];

    // Getting the URL of the menu item
    $menu_slug = strtolower(trim($item->url));

    // If the menu item URL contains the current post types slug add the current-menu-item class
    if (strpos($menu_slug,$current_post_type_slug) !== false) {

       $classes[] = 'current-menu-item';

    }

    // Return the corrected set of classes to be added to the menu item
    return $classes;

}


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'assets/styles/editor.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );