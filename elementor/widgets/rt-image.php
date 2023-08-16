<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image', 'neuzin-core' );
		$this->rt_base = 'rt-image';
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'year',
				'label'   => esc_html__( 'Year', 'neuzin-core' ),
				'default' => '10',
			),	
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'neuzin-core' ),
				'default' => esc_html__( 'Years Experience', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_bag_color',
				'label'   => esc_html__( 'Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-image .figure-holder .mask-text' => 'background: linear-gradient(245deg, {{VALUE}} 0%, {{VALUE}} 100%);',
				),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_one',
				'label'   => esc_html__( 'Image One', 'neuzin-core' ),
				'description' => esc_html__( 'Recommended image size is 360x513 px', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_two',
				'label'   => esc_html__( 'Image Two', 'neuzin-core' ),
				'description' => esc_html__( 'Recommended image size is 360x263 px', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_three',
				'label'   => esc_html__( 'Image Three', 'neuzin-core' ),
				'description' => esc_html__( 'Recommended image size is 360x323 px', 'neuzin-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-image';
	
		return $this->rt_template( $template, $data );
	}
}