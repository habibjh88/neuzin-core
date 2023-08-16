<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Plugin;
use \WP_Query;
use NeuzinTheme_Helper;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/register', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		// add_action( 'elementor/controls/controls_registered', array( $this, 'custom_icon_for_elementor' ), 10, 1 );
		add_filter( 'elementor/icons_manager/additional_tabs',  [$this, 'additional_tabs'], 10, 1 );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'after_enqueue_styles_elementor_editor' ), 10, 1 );
	}

	public function after_enqueue_styles_elementor_editor()	{

		wp_enqueue_style( 'flaticon', \NeuzinTheme_Helper::get_font_css( 'flaticon' ) );
		
	}
	public function init() {
		require_once __DIR__ . '/base.php';
		
		// Widgets -- filename=>classname /@dev
		$widgets = array(
			'title'           		=> 'Title',
			'rt-divider'           	=> 'Rt_Divider',
			'text-with-button'      => 'Text_With_Button',
			'rt-animate-image'      => 'RT_Animate_Image',
			'rt-image'      		=> 'RT_Image',
			'about-image-text'      => 'About_Image_Text',
			'info-box'        		=> 'Info_Box',
			'working-process'       => 'Working_Process',
			'rt-story'              => 'RT_Story',
			'rt-tab'              	=> 'RT_Tab',
			'cta'             		=> 'CTA',
			'contact-info'         	=> 'Contact_Info',
			'contact-address'       => 'Contact_Address',
			'progress-circle'       => 'Progress_Circle',
			'progress-bar'          => 'Progress_Bar',
			'counter'               => 'Counter',
			'post-grid'       		=> 'Post_Grid',
			'rt-team'       	    => 'RT_Team',
			'service-grid'     		=> 'Service_Grid',
			'portfolio-grid'     	=> 'Portfolio_Grid',
			'portfolio-isotope'     => 'Portfolio_Isotope',
			'portfolio-masonry'     => 'Portfolio_Masonry',
			'testimonial'       	=> 'Testimonial',
			'logo-slider'       	=> 'Logo_Slider',
			'rt-app'       			=> 'RT_App',
			'pricing-table'       	=> 'Pricing_Table',
			'nav-menu'        		=> 'Nav_Menu',
			'slider'         		=> 'Slider',
			'video'         	    => 'Video',
			'rt-shape'         	    => 'RT_Shape',
			'pagepiling-slider'     => 'Pagepiling_Slider',
			'content-toggle'        => 'Content_Toggle',
			'rt-location'                => 'RT_Location',
		);

		foreach ( $widgets as $widget => $class ) {
			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname );
		}
	}

	
	public function custom_icon_for_elementor( $controls_registry )
	{
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons		
		$flaticons = NeuzinTheme_Helper::get_flaticon_icons();
		// Then we set a new list of icons as the options of the icon control
		$new_icons = array_merge($flaticons, $icons);
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}
	
	
	public function widget_categoty( $class ) {
		$id         = NEUZIN_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'RadiusTheme Elements', 'neuzin-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
	
     public function additional_tabs($tabs)
      {
        $json_url = NeuzinTheme_Helper::get_asset_file('json/flaticon.json');

        $flaticon = [
          'name'          => 'flaticon',
          'label'         => esc_html__( 'Neuzin Icon', 'neuzin-core' ),
          'url'           => false,
          'enqueue'       => false,
          'prefix'        => '',
          'displayPrefix' => '',
          'labelIcon'     => 'fab fa-font-awesome-alt',
          'ver'           => '1.0.0',
          'fetchJson'     => $json_url,
        ];
        array_push( $tabs, $flaticon);

        return $tabs;
      }

}

new Custom_Widget_Init();