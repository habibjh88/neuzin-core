<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Grid', 'neuzin-core' );
		$this->rt_base = 'rt-post-grid';
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

	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );		
		wp_enqueue_script( 'owl-carousel' );
	}

	public function rt_fields(){
		$categories = get_categories();
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'neuzin-core' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->term_id] = $category->name;
		}
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
					'style1' => esc_html__( 'Grid 1', 'neuzin-core' ),
					'style2' => esc_html__( 'Grid 2', 'neuzin-core' ),
					'style3' => esc_html__( 'Grid 3', 'neuzin-core' ),
					'style5' => esc_html__( 'Grid 4', 'neuzin-core' ),
					'style7' => esc_html__( 'Grid 5', 'neuzin-core' ),
					'style4' => esc_html__( 'Slider 1', 'neuzin-core' ),
					'style6' => esc_html__( 'Slider 2', 'neuzin-core' ),
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Animation Delay', 'neuzin-core' ),
				'default' => '100',
				'condition'   => array( 'animation_display' => array( 'has-animation' ), 'style' => array( 'style1', 'style2', 'style3', 'style5', 'style7' ) ),
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
				'id'      => 'post_orderby',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'neuzin-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'neuzin-core' ),
				'default' => 30,
				'description' => esc_html__( 'Maximum number of words', 'neuzin-core' ),
				'condition'   => array( 'content_display' =>'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'neuzin-core' ),
				'default' => 3,
				'description' => esc_html__( 'Maximum number of words', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'neuzin-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'neuzin-core' ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'neuzin-core' ),
				'default' => 'Read More',
				'condition'   => array( 'read_display' =>'yes' ),
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Size', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-default .rtin-item .rtin-title' => 'font-size: {{VALUE}}px',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-grid-style1 .rtin-item .rtin-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style2 .rtin-item .rtin-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style3 .rtin-item h3 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style5 .rtin-item .rtin-title a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-grid-style1 .rtin-item ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style2 .rtin-item ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style3 .rtin-item ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style5 .rtin-item ul li' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-grid-style1 .rtin-item ul li i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-default .rtin-content p' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'link_color',
				'label'   => esc_html__( 'Link Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-grid-style1 .rtin-item ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style2 .rtin-item ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style3 .rtin-item ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-default .rtin-item .button-1' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'link_hover_color',
				'label'   => esc_html__( 'Link Hover Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-default .rtin-item .button-1:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style1 .rtin-item .rtin-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style1 .rtin-item ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style2 .rtin-item .rtin-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style2 .rtin-item ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style3 .rtin-item ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-grid-style3 .rtin-item h3 a:hover' => 'color: {{VALUE}}',
				),
			),	
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_color',
				'label'   => esc_html__( 'Item Background Color', 'neuzin-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-grid-style3 .rtin-item .rtin-content' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),	
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_option',
				'label'   => esc_html__( 'Option', 'neuzin-core' ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_date',
				'label'       => esc_html__( 'Show Date', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_author',
				'label'       => esc_html__( 'Show Author Name', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_comment',
				'label'       => esc_html__( 'Show Comment Number', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_category',
				'label'       => esc_html__( 'Show Categories', 'neuzin-core' ),
				'label_on'    => esc_html__( 'Show', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Hide', 'neuzin-core' ),
				'default'     => 'no',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'neuzin-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'neuzin-core' ),
				'condition'   => array( 'style' => array( 'style4', 'style6' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'neuzin-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'neuzin-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'neuzin-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'neuzin-core' ),
					'4000' => esc_html__( '4 Seconds', 'neuzin-core' ),
					'3000' => esc_html__( '3 Seconds', 'neuzin-core' ),
					'2000' => esc_html__( '2 Seconds', 'neuzin-core' ),
					'1000' => esc_html__( '1 Second',  'neuzin-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'neuzin-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'neuzin-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'neuzin-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'neuzin-core' ),
				'label_on'    => esc_html__( 'On', 'neuzin-core' ),
				'label_off'   => esc_html__( 'Off', 'neuzin-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'neuzin-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='flaticon-back'></i>", "<i class='flaticon-next'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  => array( 'items' => 12 / $data['col_xs'] ),
				'768'  => array( 'items' => 12 / $data['col_sm'] ),
				'992'  => array( 'items' => 12 / $data['col_md'] ),
				'1200' => array( 'items' => 12 / $data['col_lg'] ),
			)
		);

		switch ( $data['style'] ) {
			case 'style6':
			$template = 'post-slider-2';
			break;
			case 'style4':
			$template = 'post-slider-1';
			break;
			case 'style7':
			$template = 'post-grid-5';
			break;
			case 'style5':
			$template = 'post-grid-4';
			break;
			case 'style3':
			$template = 'post-grid-3';
			break;
			case 'style2':
			$template = 'post-grid-2';
			break;
			default:
			$template = 'post-grid-1';
			break;
		}
		
		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();
		
		return $this->rt_template( $template, $data );
	}
}