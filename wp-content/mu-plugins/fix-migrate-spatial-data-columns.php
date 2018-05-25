<?php
/**
 * Fix WP Migrate DB Pro issue with spatial data columns
 *
 */

add_filter( 'wpmdb_process_column_as_binary', function ( $process_as_binary, $struct ) {
        return ( true == $process_as_binary ) ? true : in_array( strtolower( trim( $struct->Type ) ), [
                'geometry',
                'point',
                'linestring',
                'polygon',
                'multipoint',
                'multilinestring',
                'multipolygon',
                'geometrycollection',
        ] );
}, 10, 2 );