<?php

/*
 * Trigger this file on Plugin uninstall
 * @package AayushPlugin
 */

// this is for security check
if ( !defined('WP_UNINSTALL_PLUGIN') ){
    die;
}

//Clear Database stored data for one custom post type or custom taxonomies
//1st method
/*
    $books = get_post( array( 'post_type' => 'book', 'numberposts' => -1 ) );
    foreach ( $books as $book ){
        wp_delete_post( $book->ID, true );
}*/


// to delete everything

//Access the database via SQL
// faster than above and dangerous too :D
global $wpdb;
$wpdb -> query( "DELETE FROM wp_posts WHERE post_type = 'book' " );

$wpdb -> query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );

$wpdb -> query ( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id from wp_posts)" );