<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Shape extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Shape', 'neuzin-core' );
		$this->rt_base = 'rt-shape';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Shape Style', 'neuzin-core' ),
				'options' => array(
					'style1' => esc_html__( 'Shape 1' , 'neuzin-core' ),
					'style2' => esc_html__( 'Shape 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Shape 3', 'neuzin-core' ),
					'style4' => esc_html__( 'Shape 4', 'neuzin-core' ),
					'style5' => esc_html__( 'Shape 5', 'neuzin-core' ),
					'style6' => esc_html__( 'Shape 6', 'neuzin-core' ),
					'style7' => esc_html__( 'Shape 7', 'neuzin-core' ),
					'style8' => esc_html__( 'Shape 8', 'neuzin-core' ),
					'style9' => esc_html__( 'Shape 9', 'neuzin-core' ),
					'style10' => esc_html__( 'Slider Shape 1', 'neuzin-core' ),
					'style11' => esc_html__( 'Slider Shape 2', 'neuzin-core' ),
					'style12' => esc_html__( 'Shape 12', 'neuzin-core' ),
					'style13' => esc_html__( 'Shape 13', 'neuzin-core' ),
					'style14' => esc_html__( 'Shape 14', 'neuzin-core' ),
				),
				'default' => 'style1',
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_color1',
				'label'   => esc_html__( 'Shape Color 1', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .animate-shape-style11 .animated-shape li:first-child svg path' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_color2',
				'label'   => esc_html__( 'Shape Color 2', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .animate-shape-style11 .animated-shape li stop:first-child' => 'stop-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style11' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_color3',
				'label'   => esc_html__( 'Shape Color 3', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .animate-shape-style11 .animated-shape li stop:last-child' => 'stop-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style11' ) ),
			),			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		switch ( $data['style'] ) {
			case 'style14':
			$template = 'shape-14';
			break;
			case 'style13':
			$template = 'shape-13';
			break;
			case 'style12':
			$template = 'shape-12';
			break;
			case 'style11':
			$template = 'shape-11';
			break;
			case 'style10':
			$template = 'shape-10';
			break;
			case 'style9':
			$template = 'shape-9';
			break;
			case 'style8':
			$template = 'shape-8';
			break;
			case 'style7':
			$template = 'shape-7';
			break;
			case 'style6':
			$template = 'shape-6';
			break;
			case 'style5':
			$template = 'shape-5';
			break;
			case 'style4':
			$template = 'shape-4';
			break;
			case 'style3':
			$template = 'shape-3';
			break;
			case 'style2':
			$template = 'shape-2';
			break;
			default:
			$template = 'shape-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}