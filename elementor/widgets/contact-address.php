<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Address extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Address', 'neuzin-core' );
		$this->rt_base = 'rt-contact-address';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'address_icon',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Address Icon', 'neuzin-core' ),
				'default' => '<i class="flaticon-mail"></i>',
            ]
        );

		$repeater->add_control(
            'address_label',
            [
                'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Address Label', 'neuzin-core' ),
				'default' => 'Office Name',
				'label_block' => true,
            ]
        );

		$repeater->add_control(
            'address_infos',
            [
                'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Add Address', 'neuzin-core' ),
				'default' => '29 Street, Melbourne City<br>example@gmail.com<br><a href="tel:+0123456789">+0123456789</a> ',
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'animation_display',
				'label'   => esc_html__( 'Animation Off/On', 'neuzin-core' ),
				'default' => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Animation Delay', 'neuzin-core' ),
				'default' => '100',
				'condition'   => array( 'animation_display' => array( 'yes' ) ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Theme Style', 'neuzin-core' ),
				'options' => array(
					'light' => esc_html__( 'Light Background', 'neuzin-core' ),
					'dark'  => esc_html__( 'Dark Background', 'neuzin-core' ),
				),
				'default' => 'light',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'address_title',
				'label'   => esc_html__( 'Address Tile', 'neuzin-core' ),
				'default' => 'Our Office Address',
			),

			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'address_info',
				'label'   => esc_html__( 'Address', 'neuzin-core' ),
				'fields'  => $repeater->get_controls(),
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
		
	protected function render() {
			
		$data = $this->get_settings();
		
		$template = 'contact-address';

		return $this->rt_template( $template, $data );
	}
}