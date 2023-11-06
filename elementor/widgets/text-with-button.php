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

class Text_With_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Title Text With Button', 'neuzin-core' );
		$this->rt_base = 'rt-text-with-button';
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
				'label'   => esc_html__( 'Text Style', 'neuzin-core' ),
				'options' => array(
					'style1' => esc_html__( 'Text Style 1' , 'neuzin-core' ),
					'style2' => esc_html__( 'Text Style 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Text Style 3', 'neuzin-core' ),
					'style4' => esc_html__( 'Text Style 4', 'neuzin-core' ),
					'style5' => esc_html__( 'Text Style 5', 'neuzin-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_display',
				'label'   => esc_html__( 'Animation Off/On', 'neuzin-core' ),
				'options' => array(
					'has-animation'   => esc_html__( 'On', 'neuzin-core' ),
					'no-animation'    => esc_html__( 'Off', 'neuzin-core' ),
				),
				'default' => 'has-animation',
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Animation Delay', 'neuzin-core' ),
				'default' => '100',
				'condition'   => array( 'animation_display' => array( 'has-animation' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offer_heading',
				'label'   => esc_html__( 'Offer Heading', 'neuzin-core' ),
				'default' => esc_html__( 'SUPER SALE', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => esc_html__( 'Wellcome To Neuzin', 'neuzin-core' ),
			),
			array(
				'id'      => 'title_tag',
				'label' => __( 'HTML Tag', 'neuzin-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => array(
					'h1' => esc_html__( 'H1' , 'neuzin-core' ),
					'h2' => esc_html__( 'H2' , 'neuzin-core' ),
					'h3' => esc_html__( 'H3' , 'neuzin-core' ),
					'h4' => esc_html__( 'H4' , 'neuzin-core' ),
					'h5' => esc_html__( 'H5' , 'neuzin-core' ),
					'h6' => esc_html__( 'H6' , 'neuzin-core' ),
				),
				'default' => 'h2',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'neuzin-core' ),
				'default' => esc_html__('About Us', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_shape',
				'label'       => esc_html__( 'Content Shape', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_color',
				'label'   => esc_html__( 'Shape Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .rtin-content .shape-line' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'content_shape' => array( 'yes' ), 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'neuzin-core' ),
				'default' => esc_html__('Grursus mal suada faci lisis Lorem ipsum dolarorit ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm ipsum dolocons is suada a and fadolorit to the consectetur elit.', 'neuzin-core' ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'neuzin-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .rtin-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Typo', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .subtitle',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .subtitle' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_bg_color',
				'label'   => esc_html__( 'Sub Title Bg Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-style4 .subtitle' => 'background-color: {{VALUE}}',
				),
			),			
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .title-text-button .rtin-content',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .title-text-button ul.list-arrow li:before' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Title Margin', 'neuzin-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .title-text-button .rtin-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Content Margin', 'neuzin-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .title-text-button .rtin-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'sub_title_padding',
	            'label'   => __( 'Sub Title Padding', 'neuzin-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .title-text-style4 .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'condition'   => array( 'style' => array( 'style4' ) ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Button
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'label'   => esc_html__( 'Button Style', 'neuzin-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'neuzin-core' ),
				'options' => array(
					'neuzin-button-1'   => esc_html__( 'Button 1', 'neuzin-core' ),
					'neuzin-button-2'   => esc_html__( 'Button 2', 'neuzin-core' ),
					'neuzin-button-3'   => esc_html__( 'Button 3', 'neuzin-core' ),
				),
				'default' => 'neuzin-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_one',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'Read More',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'one_buttonurl',
				'label'   => esc_html__( 'Button URL', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style_two',
				'label'   => esc_html__( 'Button Style Two', 'neuzin-core' ),
				'options' => array(
					'neuzin-button-1'   => esc_html__( 'Button 1', 'neuzin-core' ),
					'neuzin-button-2'   => esc_html__( 'Button 2', 'neuzin-core' ),
					'neuzin-button-3'   => esc_html__( 'Button 3', 'neuzin-core' ),
				),
				'default' => 'neuzin-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ), 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_two',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'Read More',
				'condition'   => array( 'button_display' => array( 'yes' ), 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'two_buttonurl',
				'label'   => esc_html__( 'Button URL', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ), 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => esc_html__( 'Button Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .btn-ghost' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_hov_color',
				'label'   => esc_html__( 'Button Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .btn-ghost:hover' => 'color: {{VALUE}}',
				),
			),					
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_hov_bg_color',
				'label'   => esc_html__( 'Button Hover Bg Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .btn-ghost:hover' => 'background-color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_color',
				'label'   => esc_html__( 'Button Border Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .title-text-button .btn-ghost' => 'border-color: {{VALUE}}',
				),
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
			case 'style5':
			$template = 'text-with-button-5';
			break;
			case 'style4':
			$template = 'text-with-button-4';
			break;
			case 'style3':
			$template = 'text-with-button-3';
			break;
			case 'style2':
			$template = 'text-with-button-2';
			break;
			default:
			$template = 'text-with-button-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}