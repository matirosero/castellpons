<?php

function cp_content_filter($content) {
   echo do_shortcode( wpautop( $content ) );
}