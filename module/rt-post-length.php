<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Post reading time */
if( !function_exists( 'neuzin_reading_time' )){

	function neuzin_reading_time(){
		$post_content = get_post()->post_content;
		$post_content = strip_shortcodes( $post_content );
		$post_content = strip_tags( $post_content );
		$word_count   = str_word_count( $post_content );
		$reading_time = floor( $word_count / 200 );

		if( $reading_time < 1){
			$result = esc_html__ ( 'Less than a minute', 'neuzin-core' );
		}
		elseif( $reading_time > 60 ){
			$result = sprintf( esc_html__( '%s hours read', 'neuzin-core' ), floor( $reading_time / 60 ) );
		}
		else if ( $reading_time == 1 ){
			$result = esc_html__( '1min read', 'neuzin-core' );
		} else {
			$result = sprintf( esc_html__( '%smins read', 'neuzin-core' ), $reading_time );
		}

		return '<span class="meta-reading-time meta-item">'. $result .'</span> ';
	}
	
}