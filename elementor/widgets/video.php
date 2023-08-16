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
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Video extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Video', 'neuzin-core' );
		$this->rt_base = 'rt-video';
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
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_display',
				'label'   => esc_html__( 'Animation Off/On', 'neuzin-core' ),
				'options' => array(
					'has-animation'     => esc_html__( 'On', 'neuzin-core' ),
					'no-animation'      => esc_html__( 'Off', 'neuzin-core' ),
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
				'id'      => 'video_title',
				'label'   => esc_html__( 'Video Title', 'neuzin-core' ),
				'default' => '',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),		
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'neuzin-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'neuzin-core' ),
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'description' => esc_html__( 'Recommended full image', 'neuzin-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'neuzin-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'neuzin-core' ),
				'selector' => '{{WRAPPER}} .rt-video .item-icon h3',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Tile Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video .item-icon h3' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bag_color',
				'label'   => esc_html__( 'Image Overlay Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video .rtin-video .item-img:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
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
			$template = 'video-3';
			break;
			case 'style2':
			$template = 'video-2';
			break;
			default:
			$template = 'video-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}