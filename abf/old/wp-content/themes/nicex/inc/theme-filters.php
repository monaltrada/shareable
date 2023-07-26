<?php

function nice_excerpt_length( $length ) {
    $new_ecxerpt = '200';
    if( $new_ecxerpt != '' ) {
        return $length = intval( $new_ecxerpt );
    } else {
        return $length;
    }
}
add_filter( 'excerpt_length', 'nice_excerpt_length', 999 );