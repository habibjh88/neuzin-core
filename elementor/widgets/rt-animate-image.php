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
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Animate_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Animate Image', 'neuzin-core' );
		$this->rt_base = 'rt-animate-image';
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
					'style1' => esc_html__( 'Image Style 1', 'neuzin-core' ),
					'style2' => esc_html__( 'Image Style 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Image Style 3', 'neuzin-core' ),
					'style4' => esc_html__( 'Image Style 4', 'neuzin-core' ),
					'style5' => esc_html__( 'Image Style 5', 'neuzin-core' ),
					'style6' => esc_html__( 'Image Style 6', 'neuzin-core' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_position',
				'label'   => esc_html__( 'Animation', 'neuzin-core' ),
				'options' => array(
					'left'     => esc_html__( 'Left', 'neuzin-core' ),
					'right'      => esc_html__( 'Right', 'neuzin-core' ),
					'top'      => esc_html__( 'Top', 'neuzin-core' ),
					'bottom'      => esc_html__( 'Bottom', 'neuzin-core' ),
					'zoomout'      => esc_html__( 'Zoomout', 'neuzin-core' ),
				),
				'default' => 'left',
				'condition'   => array( 'style' => array( 'style6' ), 'animation_display' => array( 'has-animation' ) ),
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
				'label'   => esc_html__( 'image size', 'roofit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'img_hover',
				'label'   => esc_html__( 'Hover Off/On', 'neuzin-core' ),
				'options' => array(
					'has-hover'     => esc_html__( 'On', 'neuzin-core' ),
					'no-hover'      => esc_html__( 'Off', 'neuzin-core' ),
				),
				'default' => 'no-hover',
				'condition'   => array( 'style' => array( 'style6' ) ),
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
			case 'style6':
			$template = 'animate-image-6';
			break;
			case 'style5':
			$template = 'animate-image-5';
			break;
			case 'style4':
			$template = 'animate-image-4';
			break;
			case 'style3':
			$template = 'animate-image-3';
			break;
			case 'style2':
			$template = 'animate-image-2';
			break;
			default:
			$template = 'animate-image-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}