<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    /*
     * Google Fonts
     *
     * font-family: font-family: 'Montserrat', sans-serif;
     */
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i', false );

    // TEMP
    wp_enqueue_script( 'drop-up-side-js', get_template_directory_uri() . '/assets/scripts/drop-up-side.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);