<?php

function cp_mce4_options($init) {

    $custom_colours = '
        "CC0001", "Rojo",
        "9b9b9b", "Gris medio",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'cp_mce4_options');