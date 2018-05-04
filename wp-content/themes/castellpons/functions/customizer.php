<?php

function cp_customizer_social_media_array() {

	/* store social site names in array */
	$social_sites = array('facebook', 'instagram');

	return $social_sites;
}

function cp_add_customizer_sections( $wp_customize ) {

    $social_sites = cp_customizer_social_media_array();

    // set a priority used to order the social sites
    $priority = 5;

    // section
    $wp_customize->add_section( 'ct_social_media_icons', array(
        'title'       => __( 'Social Media Icons', 'tribes' ),
        'priority'    => 25,
        'description' => __( 'Add the URL for each of your social profiles.', 'tribes' )
    ) );

    // create a setting and control for each social site
    foreach ( $social_sites as $social_site ) {

        $label = ucfirst( $social_site );

        // setting
        $wp_customize->add_setting( $social_site, array(
            'sanitize_callback' => 'esc_url_raw'
        ) );
        // control
        $wp_customize->add_control( $social_site, array(
            'type'     => 'url',
            'label'    => $label,
            'section'  => 'ct_social_media_icons',
            'priority' => $priority
        ) );
        // increment the priority for next site
        $priority = $priority + 5;
    }
}
add_action( 'customize_register', 'cp_add_customizer_sections' );


function cp_social_media_icons() {

    $social_sites = cp_customizer_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

    /* for each active social site, add it as a list item */
    if ( ! empty( $active_sites ) ) {

        echo "<ul class='social-media-icons menu'>";

        foreach ( $active_sites as $active_site ) {

            /* setup the class */
	        $class = 'icon-' . $active_site;
            ?>

                <li>
                    <a class="social-icon-link <?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                        <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                    </a>
                </li>
            <?php

        }
        echo "</ul>";
    }
}