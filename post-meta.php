<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use devofwp\Neuzin\Theme;
use devofwp\Neuzin\Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = NEUZIN_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'neuzin-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'neuzin-core' ) ) + Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'neuzin-core' ), array( 'page', 'post', 'neuzin_team', 'neuzin_service', 'neuzin_portfolio', 'neuzin_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'neuzin-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'neuzin-core' ),
						'full-width'    => __( 'Full Width', 'neuzin-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'neuzin-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'neuzin-core' ),
					),
					'default'  => 'default',
				),		
				'neuzin_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'neuzin-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'neuzin-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'neuzin-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enabled', 'neuzin-core' ),
						'off'     => __( 'Disabled', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'neuzin-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enabled', 'neuzin-core' ),
						'off'     => __( 'Disabled', 'neuzin-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'neuzin-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'neuzin-core' ),
						'1'       => __( 'Layout 1', 'neuzin-core' ),
						'2'       => __( 'Layout 2', 'neuzin-core' ),
						'3'       => __( 'Layout 3', 'neuzin-core' ),
						'4'       => __( 'Layout 4', 'neuzin-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'neuzin-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enabled', 'neuzin-core' ),
						'off'     => __( 'Disabled', 'neuzin-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'1'       => __( 'Layout 1', 'neuzin-core' ),
						'2'       => __( 'Layout 2', 'neuzin-core' ),
						'3'       => __( 'Layout 3', 'neuzin-core' ),
						'4'       => __( 'Layout 4', 'neuzin-core' ),
						'5'       => __( 'Layout 5', 'neuzin-core' ),
						'6'       => __( 'Layout 6', 'neuzin-core' ),
						'7'       => __( 'Layout 7', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'1'       => __( 'Layout 1', 'neuzin-core' ),
						'2'       => __( 'Layout 2', 'neuzin-core' ),
						'3'       => __( 'Layout 3', 'neuzin-core' ),
						'4'       => __( 'Layout 4', 'neuzin-core' ),
						'5'       => __( 'Layout 5', 'neuzin-core' ),
						'6'       => __( 'Layout 6', 'neuzin-core' ),
						'7'       => __( 'Layout 7', 'neuzin-core' ),
						'8'       => __( 'Layout 8', 'neuzin-core' ),
						'9'       => __( 'Layout 9', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'neuzin-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enabled', 'neuzin-core' ),
						'off'     => __( 'Disabled', 'neuzin-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'neuzin-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enabled', 'neuzin-core' ),
						'off'     => __( 'Disabled', 'neuzin-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'0px'     => __( '0px', 'neuzin-core' ),
						'10px'    => __( '10px', 'neuzin-core' ),
						'20px'    => __( '20px', 'neuzin-core' ),
						'30px'    => __( '30px', 'neuzin-core' ),
						'40px'    => __( '40px', 'neuzin-core' ),
						'50px'    => __( '50px', 'neuzin-core' ),
						'60px'    => __( '60px', 'neuzin-core' ),
						'70px'    => __( '70px', 'neuzin-core' ),
						'80px'    => __( '80px', 'neuzin-core' ),
						'90px'    => __( '90px', 'neuzin-core' ),
						'100px'   => __( '100px', 'neuzin-core' ),
						'110px'   => __( '110px', 'neuzin-core' ),
						'120px'   => __( '120px', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'0px'     => __( '0px', 'neuzin-core' ),
						'10px'    => __( '10px', 'neuzin-core' ),
						'20px'    => __( '20px', 'neuzin-core' ),
						'30px'    => __( '30px', 'neuzin-core' ),
						'40px'    => __( '40px', 'neuzin-core' ),
						'50px'    => __( '50px', 'neuzin-core' ),
						'60px'    => __( '60px', 'neuzin-core' ),
						'70px'    => __( '70px', 'neuzin-core' ),
						'80px'    => __( '80px', 'neuzin-core' ),
						'90px'    => __( '90px', 'neuzin-core' ),
						'100px'   => __( '100px', 'neuzin-core' ),
						'110px'   => __( '110px', 'neuzin-core' ),
						'120px'   => __( '120px', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'	  => __( 'Enable', 'neuzin-core' ),
						'off'	  => __( 'Disable', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'on'      => __( 'Enable', 'neuzin-core' ),
						'off'	  => __( 'Disable', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_title_align" => array(
					'label'   => __( 'Banner Title Align', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'center' => __( 'Center', 'neuzin-core' ),
						'left'	  => __( 'Left', 'neuzin-core' ),
						'right'	  => __( 'Right', 'neuzin-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'neuzin-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'neuzin-core' ),
						'bgimg'   => __( 'Background Image', 'neuzin-core' ),
						'bgcolor' => __( 'Background Color', 'neuzin-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'neuzin-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'neuzin-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'neuzin-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'neuzin-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'neuzin-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'neuzin-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'neuzin-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'neuzin-core' ),
				),
			)
		)
	),
) );


/*-------------------------------------
#. Team
---------------------------------------*/

$Postmeta->add_meta_box( 'neuzin_team_settings', __( 'Team Member Settings', 'neuzin-core' ), array( 'neuzin_team' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_team_designation' => array(
			'label' => __( 'Designation', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_team_email' => array(
			'label' => __( 'Email', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_team_phone' => array(
			'label' => __( 'Phone', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_team_address' => array(
			'label' => __( 'Address', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_team_socials_header' => array(
			'label' => __( 'Socials', 'neuzin-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'neuzin-core' ),
		),
		'neuzin_team_socials' => array(
			'type'  => 'group',
			'value'  => Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'neuzin_team_skills', __( 'Team Member Skills', 'neuzin-core' ), array( 'neuzin_team' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'neuzin-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'neuzin-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'neuzin-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'neuzin-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'neuzin-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'neuzin-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'neuzin-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'neuzin_team_contact', __( 'Team Member Contact', 'neuzin-core' ), array( 'neuzin_team' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'neuzin-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Service
---------------------------------------*/
$Postmeta->add_meta_box( 'neuzin_service_info', __( 'Service Info', 'neuzin-core' ), array( 'neuzin_service' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_service_contact' => array(
			'label' => __( 'Service Contact', 'clenix-core' ),
			'type'  => 'text',
		),
		'neuzin_service_email' => array(
			'label' => __( 'Service E-mail', 'clenix-core' ),
			'type'  => 'text',
		),
		'neuzin_service_button' => array(
			'label' => __( 'Service Button', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_service_url' => array(
			'label' => __( 'Service Button Url', 'neuzin-core' ),
			'type'  => 'text',
		),
	),
) );

$Postmeta->add_meta_box( 'neuzin_service_media', __( 'Service Icon image', 'neuzin-core' ),
		array( "neuzin_service" ),'',
		'side',
		'default', array(
		'fields' => array(
			"neuzin_service_icon" => array(
			  'label' => __( 'Service Icon', 'neuzin-core' ),
			  'type'  => 'icon_select',
			  'desc'  => __( "Choose a Icon for your service", 'neuzin-core' ),
			  'options' => Helper::get_icons(),
			),
			"neuzin_service_img" => array(
				'label' => __( 'Service Image', 'neuzin-core' ),
				'type'  => 'image',
				'desc'  => __( "Upload service image in case of icon not selected", 'neuzin-core' ),
			),
		)
) );
/*-------------------------------------
#. Portfolio
---------------------------------------*/

$Postmeta->add_meta_box( 'neuzin_portfolio_info', __( 'Portfolio Info', 'neuzin-core' ), array( 'neuzin_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_port_info_title' => array(
			'label' => __( 'Info Title', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_port_des' => array(
			'label' => __( 'Info Description', 'neuzin-core' ),
			'type'  => 'textarea',
		),
		'neuzin_client_name' => array(
			'label' => __( 'Client', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_start_date' => array(
			'label' => __( 'Start Date', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_finish_date' => array(
			'label' => __( 'End Date', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_website' => array(
			'label' => __( 'Website', 'neuzin-core' ),
			'type'  => 'text',
		),
		'neuzin_port_rating' => array(
			'label' => __( 'Select the Rating', 'neuzin-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'neuzin-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),	
		'neuzin_port_image' => array(
			'label' => __( 'Portfolio Right Image', 'neuzin-core' ),
			'type'  => 'image',
		),			
		'neuzin_port_gallery' => array(
			'label' => __( 'Portfolio Gallery', 'neuzin-core' ),
			'type'  => 'gallery',
		),
	),
) );

$Postmeta->add_meta_box( 'neuzin_portfolio_share', __( 'Portfolio Social Share', 'neuzin-core' ), array( 'neuzin_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_portfolio_socials' => array(
			'label' => __( 'Socials', 'neuzin-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'neuzin-core' ),
		),
		'neuzin_portfolio_icons' => array(
			'type'  => 'group',
			'value'  => Helper::team_socials()
		),
	)
) );

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'neuzin_testimonial_info', __( 'Testimonial Info', 'neuzin-core' ), array( 'neuzin_testim' ), '', '', 'high', array(
	'fields' => array(
		'neuzin_tes_designation' => array(
			'label' => __( 'Designation', 'neuzin-core' ),
			'type'  => 'text',
		),		
		'neuzin_tes_rating' => array(
			'label' => __( 'Select the Rating', 'neuzin-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'neuzin-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),
	)
) );