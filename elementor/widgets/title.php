<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Neuzin_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;

if ( ! defined( 'ABSPATH' ) ) exit;

class Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Section Title', 'neuzin-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'News Title', 'neuzin-core' ),
			),
			/*box title*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Title Style', 'neuzin-core' ),
				'options' => array(
					'style1' => esc_html__( 'Title Style 1' , 'neuzin-core' ),
					'style2' => esc_html__( 'Title Style 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Title Style 3', 'neuzin-core' ),
					'style4' => esc_html__( 'Title Style 4', 'neuzin-core' ),
				),
				'default' => 'style1',
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Align', 'neuzin-core' ),
				'options' => array(
					'left'   => esc_html__( 'Left', 'neuzin-core' ),
					'center'    => esc_html__( 'Center', 'neuzin-core' ),
					'right'    => esc_html__( 'Right', 'neuzin-core' ),
				),
				'default' => 'center',
				'condition'   => array( 'style' => array( 'style2' ) ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'neuzin-core' ),
				'options' => array(
					'bottom'   => esc_html__( 'Bottom', 'neuzin-core' ),
					'top'      => esc_html__( 'Top', 'neuzin-core' ),
				),
				'default' => 'bottom',
				'condition'   => array( 'animation_display' => array( 'has-animation' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Animation Delay', 'neuzin-core' ),
				'default' => '100',
				'condition'   => array( 'animation_display' => array( 'has-animation' ) ),
			),
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'neuzin-core' ),
				'default' => array(
			      'value' => 'flaticon-rocket',
			      'library' => 'fa-solid',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => 'Wellcome To Neuzin',
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'sub_title_shape',
				'label'       => esc_html__( 'Sub Title Shape', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_shape_color',
				'label'   => esc_html__( 'Shape Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title-style2 .sub-title-shape:before' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'sub_title_shape' => array( 'yes' ), 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'neuzin-core' ),
				'default' => 'Our subtitle',
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4' ) ),
			),			
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'neuzin-core' ),
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting has been the industrys standard dummy text ever since', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4' ) ),
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
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'neuzin-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .section-default-style .rtin-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .section-default-style .sub-title',
				'condition'   => array( 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-default-style .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bar_color',
				'label'   => esc_html__( 'Title Bar Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title-style1 .heading-icon .dashed1' => 'stroke: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title-style1 .heading-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-default-style .sub-title' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_text_color',
				'label'   => esc_html__( 'Sub Text Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-default-style .sub-text' => 'color: {{VALUE}}',
				),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_titlebg_color',
				'label'   => esc_html__( 'Sub titlt bg Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title-style4 .sub-title' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),			
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'content_width',
				'label'   		=> esc_html__( 'Content Width', 'neuzin-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .section-default-style .sub-text' => 'width: {{SIZE}}{{UNIT}};',
				)
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
			case 'style4':
			$template = 'title-4';
			break;
			case 'style3':
			$template = 'title-3';
			break;
			case 'style2':
			$template = 'title-2';
			break;
			default:
			$template = 'title-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}