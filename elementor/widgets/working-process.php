<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Working_Process extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Working Process', 'neuzin-core' );
		$this->rt_base = 'rt-working-process';
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
				'label'   => esc_html__( 'Style', 'neuzin-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'neuzin-core' ),
					'style2' => esc_html__( 'Style 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Style 3', 'neuzin-core' ),
					'style4' => esc_html__( 'Style 4', 'neuzin-core' ),
					'style5' => esc_html__( 'Style 5', 'neuzin-core' ),
					'style6' => esc_html__( 'Style 6', 'neuzin-core' ),
					'style7' => esc_html__( 'Style 7', 'neuzin-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => esc_html__( 'Theme', 'neuzin-core' ),
				'options' => array(
					'lefticon' => esc_html__( 'Left Icon', 'neuzin-core' ),
					'righticon' => esc_html__( 'Right Icon', 'neuzin-core' ),
				),
				'default' => 'lefticon',
				'condition'   => array( 'style' => array( 'style4' ) ),
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
				'id'      => 'process_no',
				'label'   => esc_html__( 'Process No', 'neuzin-core' ),
				'default' => '1',
				'condition'   => array( 'style' => array( 'style1', 'style5', 'style7' ) ),
			),
			/*Icon Start*/
			
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => [
			     'icon' => [
			       'title' => esc_html__( 'Left', 'neuzin-core' ),
			       'icon' => 'fa fa-smile-o',
			     ],
			     'image' => [
			       'title' => esc_html__( 'Center', 'neuzin-core' ),
			       'icon' => 'fa fa-image',
			     ],		     
			   ],
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'neuzin-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
				'condition'   => array( 'style' => array( 'style6' ) ),
			),			
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'neuzin-core' ),
				'default' => array(
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
				),
				'condition'   => array('icontype' => array( 'icon' ), 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6' ) ),
			),			
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'neuzin-core' ),
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style6' ) ),
				'description' => esc_html__( 'Recommended full image', 'neuzin-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'roofit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style6' ) ),
			),			
			/*Icon end*/
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-item .rtin-icon i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .working-process-default .rtin-item .rtin-icon i:before' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => esc_html__( 'Development', 'neuzin-core' ),
			),			
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'neuzin-core' ),
				'default' => esc_html__( 'Grursus mal suada faci ipsum to and the and dolarorit ametion consectetur elitto more bulum that odio', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4', 'style7' ) ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),
			
			/*Title Style Option*/
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
				'selector' => '{{WRAPPER}} .working-process-default .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .working-process-default .rtin-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-text' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-item .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style6' ) ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-item:hover .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_color',
				'label'   => esc_html__( 'Icon Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-item .rtin-icon' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_hover_color',
				'label'   => esc_html__( 'Icon Background Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-default .rtin-item:hover .rtin-icon' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'no_color',
				'label'   => esc_html__( 'Number Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-style5 .count-number' => 'color: {{VALUE}}',
					'{{WRAPPER}} .working-process-style7 .count-number' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'no_bag_color',
				'label'   => esc_html__( 'Number Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-style5 .count-number' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .working-process-style7 .count-number' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bag_color',
				'label'   => esc_html__( 'Box Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .working-process-style5 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .working-process-style7 .rtin-content' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
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
			case 'style7':
			$template = 'working-process-7';
			break;
			case 'style6':
			$template = 'working-process-6';
			break;
			case 'style5':
			$template = 'working-process-5';
			break;
			case 'style4':
			$template = 'working-process-4';
			break;
			case 'style3':
			$template = 'working-process-3';
			break;
			case 'style2':
			$template = 'working-process-2';
			break;
			default:
			$template = 'working-process-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}