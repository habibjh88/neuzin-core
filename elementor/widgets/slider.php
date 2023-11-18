<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'FullScreen Slider', 'neuzin-core' );
		$this->rt_base = 'rt-slider';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Image', 'neuzin-core' ),
				'description' => esc_html__( 'Image size should be 1920x820 px', 'neuzin-core' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => 'LOREM IPSUM DUMMY TEXT',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Content (For desktop and tab)', 'neuzin-core' ),
				'default' => 'Mimply dummy text of the printing type setting area lead spsum dolor onsecte dipiscing. Mimply dummy text printing apsum dolor onsecte dipiscing.',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'content_mob',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Content (For mobile)', 'neuzin-core' ),
				'default' => 'Dorem ipsum dolor sit amet, consectetur adipisicing',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title_color',
            [
                'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-title' => 'color: {{VALUE}}',
				),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'sub_title_color',
            [
                'type' => Controls_Manager::COLOR,
				'label'   	=> esc_html__( 'Sub Title Color', 'neuzin-core' ),
				'default' 	=> '',
				'selectors' => array(
				'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-sub-title' => 'color: {{VALUE}}',
				),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'content_color',
            [
                'type' => Controls_Manager::COLOR,
				'label'   	=> esc_html__( 'Content Color', 'neuzin-core' ),
				'default' 	=> '',
				'selectors' => array(
				'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-content-desk' => 'color: {{VALUE}}',
				'{{WRAPPER}} .rt-el-slider .rtin-content .rtin-content-inner .rtin-content-wrap .rtin-content-mob' => 'color: {{VALUE}}',
				),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'buttontext',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'LOREM IPSUM',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'buttonurl',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button URL', 'neuzin-core' ),
                'label_block' => true,
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Slider Layout', 'neuzin-core' ),
				'options' => array(
					'slider1' => esc_html__( 'Slider Layout 1', 'neuzin-core' ),
					'slider2' => esc_html__( 'Slider Layout 2', 'neuzin-core' ),
				),
				'default' => 'slider1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'slides',
				'label'   => esc_html__( 'Add as many slides as you want', 'neuzin-core' ),
				'fields'  => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dot', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dot. Default: Off', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'neuzin-core' ),
			),
			array(
				'type'    	  => Controls_Manager::SELECT2,
				'id'      	  => 'slider_effect',
				'label'   	  => esc_html__( 'Slider Effect', 'neuzin-core' ),
				'options' 	  => array(
					'sliceDown' 		=> esc_html__( 'SliceDown', 'blogxer-core' ),
					'sliceDownLeft' 	=> esc_html__( 'SliceDownLeft', 'blogxer-core' ),
					'sliceUp' 			=> esc_html__( 'SliceUp', 'blogxer-core' ),
					'sliceUpLeft' 		=> esc_html__( 'SliceUpLeft', 'blogxer-core' ),
					'sliceUpDown' 		=> esc_html__( 'SliceUpDown',  'blogxer-core' ),
					'SliceUpDownLeft' 	=> esc_html__( 'SliceUpDownLeft',  'blogxer-core' ),
					'fade' 				=> esc_html__( 'Fade',  'blogxer-core' ),
					'slideInRight' 		=> esc_html__( 'SlideInRight',  'blogxer-core' ),
					'slideInLeft' 		=> esc_html__( 'SlideInLeft',  'blogxer-core' ),
					'boxRainReverse' 	=> esc_html__( 'BoxRainReverse',  'blogxer-core' ),
				),
				'default' 	  => 'boxRainReverse',
				'description' => esc_html__( 'Slider Effect. Default: boxRainReverse', 'neuzin-core' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'slider_anim_speed',
				'label'   	  => esc_html__( 'Slider Animatin Speed', 'neuzin-core' ),
				'default' 	  => 500,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 500', 'neuzin-core' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'slider_pause_time',
				'label'   	  => esc_html__( 'Slider Pause Time', 'neuzin-core' ),
				'default' 	  => 3000,
				'description' => esc_html__( 'Slide Pause Time. Default: 3000', 'neuzin-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$this->rt_load_scripts();

		$template = 'slider';

		return $this->rt_template( $template, $data );
	}
}