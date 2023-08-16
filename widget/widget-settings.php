<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'neuzin_widgets_init' );
function neuzin_widgets_init() {

	// Register Custom Widgets
	register_widget( 'NeuzinTheme_About_Widget' );
	register_widget( 'NeuzinTheme_Address_Widget' );
	register_widget( 'NeuzinTheme_Social_Widget' );
	register_widget( 'NeuzinTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'NeuzinTheme_Post_Box' );
	register_widget( 'NeuzinTheme_Post_Tab' );
	register_widget( 'NeuzinTheme_Feature_Post' );
	register_widget( 'NeuzinTheme_Open_Hour_Widget' );
	register_widget( 'NeuzinTheme_Product_Box' );
	
}