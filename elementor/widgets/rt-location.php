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
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Location extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Location', 'neuzin-core' );
		$this->rt_base = 'rt-location';
		parent::__construct( $data, $args );
	}


	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
	        'location', [
	            'label' => __( 'Location Name', 'neuzin-core' ),
	            'type' => Controls_Manager::TEXT,
	            'default' => esc_html__( 'Fulton Street, 080 USA', 'neuzin-core' ),
	            'label_block' => true,
	        ]
	    );
	    $repeater->add_control(
	        'location_position',
	        [
	            'label' => __( 'Location Position', 'neuzin-core' ),
	            'type' => Controls_Manager::HEADING,
	            'separator' => 'before',
	        ]
	    );
	    $repeater->add_responsive_control(
	        'location_horizontal_position',
	        [
	            'label' => __( 'Horizontal Position Base', 'neuzin-core' ),
	            'type' => Controls_Manager::SELECT,
	            'default' => 'left',
	            'options' => [
	                'left'  => __( 'Left', 'neuzin-core' ),
	                'right'  => __( 'Right', 'neuzin-core' ),
	            ],
	        ]
	    );
	    $repeater->add_responsive_control(
	        'location_position_horizontal_left',
	        [
	            'label' => __( 'Horizontal Position', 'neuzin-core' ),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => [ 'px', '%' ],
	            'range' => [
	                'px' => [
	                    'min' => -5000,
	                    'max' => 5000,
	                    'step' => 1,
	                ],
	                '%' => [
	                    'min' => -100,
	                    'max' => 100,
	                ],
	            ],
	            'default' => [
	                'unit' => 'px',
	                'size' => 0,
	            ],
	            'selectors' => [
	                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{size}}{{unit}}',
	            ],
	            'condition' => [
	                'location_horizontal_position' => 'left',
	            ],
	             
	        ]
	    );
	    $repeater->add_responsive_control(
	        'location_position_horizontal_right',
	        [
	            'label' => __( 'Horizontal Position', 'neuzin-core' ),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => [ 'px', '%' ],
	            'range' => [
	                'px' => [
	                    'min' => -5000,
	                    'max' => 5000,
	                    'step' => 1,
	                ],
	                '%' => [
	                    'min' => -100,
	                    'max' => 100,
	                ],
	            ],
	            'default' => [
	                'unit' => 'px',
	                'size' => 0,
	            ],
	            'selectors' => [
	                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'right: {{size}}{{unit}}',
	            ],
	            'condition' => [
	                'location_horizontal_position' => 'right',
	            ],
	             
	        ]
	    );
	     $repeater->add_responsive_control(
	        'location_vertical_position',
	        [
	            'label' => __( 'Vertical Position Base', 'neuzin-core' ),
	            'type' => Controls_Manager::SELECT,
	            'default' => 'top',
	            'options' => [
	                'top'  => __( 'Top', 'neuzin-core' ),
	                'bottom'  => __( 'Bottom', 'neuzin-core' ),
	            ],
	        ]
	    );
	    $repeater->add_responsive_control(
	        'location_position_vartical_top',
	        [
	            'label' => __( 'Vertical Position', 'neuzin-core' ),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => [ 'px', '%' ],
	            'range' => [
	                'px' => [
	                    'min' => -5000,
	                    'max' => 5000,
	                    'step' => 1,
	                ],
	                '%' => [
	                    'min' => -100,
	                    'max' => 100,
	                ],
	            ],
	            'default' => [
	                'unit' => 'px',
	                'size' => 0,
	            ],
	            'selectors' => [
	                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{size}}{{unit}}',
	            ],
	            'condition' => [
	                'location_vertical_position' => 'top',
	            ],
	            
	        ]
	    );
	    $repeater->add_responsive_control(
	        'location_position_vartical_bottom',
	        [
	            'label' => __( 'Vertical Position', 'neuzin-core' ),
	            'type' => Controls_Manager::SLIDER,
	            'size_units' => [ 'px', '%' ],
	            'range' => [
	                'px' => [
	                    'min' => -5000,
	                    'max' => 5000,
	                    'step' => 1,
	                ],
	                '%' => [
	                    'min' => -100,
	                    'max' => 100,
	                ],
	            ],
	            'default' => [
	                'unit' => 'px',
	                'size' => 0,
	            ],
	            'selectors' => [
	                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'bottom: {{size}}{{unit}}',
	            ],
	            'condition' => [
	                'location_vertical_position' => 'bottom',
	            ],
	            
	        ]
	    );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array(
				'type' => Controls_Manager::MEDIA,
				'id'   => 'location_img',
				'label' => esc_html__('Location Image', 'neuzin-core'),
				'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'location_items',
				'label'   => esc_html__( 'Add Location', 'neuzin-core' ),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$template = 'rt-location';

		return $this->rt_template( $template, $data );
	}
}