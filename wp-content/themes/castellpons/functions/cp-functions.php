<?php

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 * http://aaronrutley.com/responsive-images-in-wordpress-with-acf/
 */
// '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px'
function cp_build_srcset_sizes($small,$medium,$large) {

    $sizes = '';

    if ( isset( $small ) ) {
        // $sizes['640px'] = $small;
        $sizes .= '(max-width: 640px) '.$small.', ';
    }

    if ( isset( $medium ) ) {
        // $sizes['1024px'] = $medium;
        $sizes .= '(max-width: 1024px) '.$medium.', ';
    }

    if ( isset( $large ) ) {
        // $sizes['1200px'] = $large;
        $sizes .= $large;
    }

    return $sizes;

}

function cp_srcset($image_id,$image_size,$sizes){

    // check the image ID is not blank
    if($image_id != '') {

        // var_dump($image_size);
        $src = wp_get_attachment_image_src( $image_id, $image_size );
        // var_dump($src);
        $srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
        // $sizes = wp_get_attachment_image_sizes( $image_id, $image_size );
        $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

        $return = '<img src="' . esc_attr( $src[0] ) . '"
            srcset="' . esc_attr( $srcset ) . '"
            sizes="' . esc_attr( $sizes ) . '"
            alt="' . esc_attr( $alt ) . '" />';

        return $return;

    }
}

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


/**
 * Get rid of tags on posts.
 */
function cp_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'cp_unregister_tags' );