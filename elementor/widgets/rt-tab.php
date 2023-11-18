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

class RT_Tab extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Tab', 'neuzin-core' );
		$this->rt_base = 'rt-tab';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'themestyle',
            [
                'type' => Controls_Manager::SELECT2,
				'label'   => esc_html__( 'Icon Style', 'neuzin-core' ),
				'options' => array(
					'california' => esc_html__( 'Theme 1', 'neuzin-core' ),
					'mountain-meadow' => esc_html__( 'Theme 2', 'neuzin-core' ),
					'royal-blue' => esc_html__( 'Theme 3', 'neuzin-core' ),
					'torch-red' => esc_html__( 'Theme 4', 'neuzin-core' ),
					'turquoise' => esc_html__( 'Theme 5', 'neuzin-core' ),
				),
				'default' => 'california',
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Icon Style', 'neuzin-core' ),
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
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'icon_class',
            [
                'type' => Controls_Manager::ICONS,
				'label'   => esc_html__( 'Icon', 'neuzin-core' ),
				'default' => [
					'value' => 'fas fa-smile-wink',
					'library' => 'fa-solid',
				],
                'label_block' => true,
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Tab', 'neuzin-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'tab_items',
				'label'   => esc_html__( 'Tab Items', 'neuzin-core' ),
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
				'selector' => '{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item span',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item a i' => 'color: {{VALUE}}',
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
				'id'      => 'tab_bag_color',
				'label'   => esc_html__( 'Tab Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item a' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'tab_bag_hov_color',
				'label'   => esc_html__( 'Tab Background Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item a.active' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-tab .tab-nav-list .nav-item a:hover' => 'background-color: {{VALUE}}',
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

		$template = 'rt-tab';

		return $this->rt_template( $template, $data );
	}
}