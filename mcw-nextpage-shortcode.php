<?php
/*
Plugin Name: McWebby Nextpage Shortcode
Plugin URI: https://github.com/donnamcmaster/mcw-nextpage-shortcode
Description: Converts [nextpage] to the proper nextpage comment.
Version: 00.01.00
Author: Donna McMaster, based on code by Birgir Erlendsson
Author URI: http://www.donnamcmaster.com/
License: GNU GPU v3
All credit goes to Birgir Erlendsson https://github.com/birgire for
https://wordpress.stackexchange.com/questions/183978/nextpage-as-a-shortcode-within-the-loop. 
I just turned his code into a simple plugin. 
*/

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Replace [nextpage] with <!--nextpage--> through the 'the_posts' filter.
 *
 * @see http://wordpress.stackexchange.com/a/183980/26350
 */

! is_admin() && add_filter( 'the_posts', function( $posts )
{
    $posts = array_map( function( $p )
    {
        if ( false !== strpos( $p->post_content, '[nextpage]' ) )
            $p->post_content = str_replace( '[nextpage]', '<!--nextpage-->', $p->post_content ); 
        return $p;
    }, $posts );
    return $posts;
});
