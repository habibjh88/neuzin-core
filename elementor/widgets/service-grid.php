<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Service_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Service Grid', 'neuzin-core' );
		$this->rt_base = 'rt-service-grid';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'neuzin-core' ),
				'6'  => esc_html__( '2 Col', 'neuzin-core' ),
				'4'  => esc_html__( '3 Col', 'neuzin-core' ),
				'3'  => esc_html__( '4 Col', 'neuzin-core' ),
				'2'  => esc_html__( '6 Col', 'neuzin-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		
		$terms  = get_terms( array( 'taxonomy' => 'neuzin_service_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'neuzin-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'post_not_in',
            [
                'type' => Controls_Manager::NUMBER,
				'label'   => esc_html__( 'Post ID', 'neuzin-core' ),
				'default' => '0',
                'label_block' => true,
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'neuzin-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Service 1', 'neuzin-core' ),
					'layout2' => esc_html__( 'Service 2', 'neuzin-core' ),
					'layout3' => esc_html__( 'Service 3', 'neuzin-core' ),
				),
				'default' => 'layout1',
			),
			array (
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'cat_single',
				'label'     => esc_html__( 'Categories', 'zugan-core' ),
				'options'   => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'neuzin-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'neuzin-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'neuzin-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'neuzin-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'neuzin-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'neuzin-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'neuzin-core' ),
					'title' 		=> esc_html__( 'By Name', 'neuzin-core' ),
				),
				'default' => 'recent',
			),			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'neuzin-core' ),
				'fields'  => $repeater->get_controls(),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'neuzin-core' ),
				'options' => array(
					'show'        => esc_html__( 'Gap', 'neuzin-core' ),
					'hide'        => esc_html__( 'No Gap', 'neuzin-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'neuzin-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title Word count', 'neuzin-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'neuzin-core' ),				
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'excerpt_display',
				'label'       => esc_html__( 'Excerpt/Content Display', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'neuzin-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'neuzin-core' ),
				'condition'   => array( 'excerpt_display' =>'yes' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Read More', 'neuzin-core' ),
				'default' => esc_html__( 'Read More', 'neuzin-core' ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color',
				'label'   => esc_html__( 'Item Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .case-study-default .rtin-item .rtin-content h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .case-study-default .rtin-item .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color_hover',
				'label'   => esc_html__( 'Item Title Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-study-default .rtin-item .rtin-content h3 a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_content_color',
				'label'   => esc_html__( 'Item Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-grid-layout1 .rtin-item .rtin-content p' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'neuzin-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'neuzin-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'neuzin-core' ),
				),
				'default' => 'show',				
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'All Services', 'neuzin-core' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'neuzin-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'neuzin-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'neuzin-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'neuzin-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'neuzin-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout3':
			$template = 'service-grid-3';
			break;
			case 'layout2':
			$template = 'service-grid-2';
			break;
			default:
			$template = 'service-grid-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}