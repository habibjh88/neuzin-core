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
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Story extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Story', 'neuzin-core' );
		$this->rt_base = 'rt-story';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'story_year',
            [
                'type' => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Year', 'neuzin-core' ),
				'default' => '2020',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Title', 'neuzin-core' ),
				'default' => esc_html__( 'Digital Solutions', 'neuzin-core' ),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'content',
            [
                'type' => Controls_Manager::WYSIWYG,
				'label'   => esc_html__( 'Content', 'neuzin-core' ),
				'default' => esc_html__( 'Grursus mal suada faci lisis Lorem ipsum more dolarorit ametion consectetur elit.', 'neuzin-core' ),
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'story_info',
				'label'   => esc_html__( 'RT Story', 'neuzin-core' ),
				'fields'  => $repeater->get_controls(),
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
				'selector' => '{{WRAPPER}} .rtin-story .story-layout .story-box-layout .rtin-content .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout .story-box-layout .rtin-content .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout .story-box-layout .rtin-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'year_color',
				'label'   => esc_html__( 'Year Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout .story-box-layout .rtin-year' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'dot_color',
				'label'   => esc_html__( 'Dot Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout .story-box-layout:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'line_color',
				'label'   => esc_html__( 'Line Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Box Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-story .story-layout .story-box-layout .rtin-content' => 'background-color: {{VALUE}}',
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

		$template = 'rt-story';

		return $this->rt_template( $template, $data );
	}
}