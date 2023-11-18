<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'neuzin_widgets_init' );
function neuzin_widgets_init() {

	// Register Custom Widgets
	register_widget( 'Theme_About_Widget' );
	register_widget( 'Theme_Address_Widget' );
	register_widget( 'Theme_Social_Widget' );
	register_widget( 'Theme_Recent_Posts_With_Image_Widget' );
	register_widget( 'Theme_Post_Box' );
	register_widget( 'Theme_Post_Tab' );
	register_widget( 'Theme_Feature_Post' );
	register_widget( 'Theme_Open_Hour_Widget' );
	register_widget( 'Theme_Product_Box' );
	
}