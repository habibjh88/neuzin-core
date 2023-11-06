<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;

if ( ! defined( 'ABSPATH' ) ) exit;

class CTA extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Call to Action', 'neuzin-core' );
		$this->rt_base = 'rt-cta';
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
				'label'   => esc_html__( 'CTA Style', 'neuzin-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'neuzin-core' ),
					'style2' => esc_html__( 'Style 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Style 3', 'neuzin-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => esc_html__( 'Get started with your free estimate', 'neuzin-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .rt-el-cta .align-items h2',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_typo',
				'label'   => esc_html__( 'Icon Style', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .cta-style2 .phone-number span i:before',
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content Text ', 'neuzin-core' ),
				'default' => '',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'pho_number',
				'label'   => esc_html__( 'Phone Number', 'neuzin-core' ),
				'default' => '+ 95 888 777',
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'neuzin-core' ),
				'options' => array(
					'neuzin-button-1'        => esc_html__( 'Button 1', 'neuzin-core' ),
					'neuzin-button-2'        => esc_html__( 'Button 2', 'neuzin-core' ),
				),
				'default' => 'neuzin-button-1',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'Purchase Now',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			/*button two*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'two_button_style',
				'label'   => esc_html__( 'Button Style', 'neuzin-core' ),
				'options' => array(
					'neuzin-button-1'        => esc_html__( 'Button 1', 'neuzin-core' ),
					'neuzin-button-2'        => esc_html__( 'Button 2', 'neuzin-core' ),
				),
				'default' => 'neuzin-button-1',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'two_buttontext',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'Purchase Now',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'two_buttonurl',
				'label'   => esc_html__( 'Button URL', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .cta-content h2' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .cta-content p' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .cta-style2 .phone-number span i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-style2 .phone-number span i:before' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone_color',
				'label'   => esc_html__( 'Phone No Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-el-cta .align-items h3 a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
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
			case 'style3':
			$template = 'cta-3';
			break;
			case 'style2':
			$template = 'cta-2';
			break;
			default:
			$template = 'cta-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}