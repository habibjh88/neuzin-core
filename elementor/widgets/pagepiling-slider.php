<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Pagepiling_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Pagepiling Slider', 'neuzin-core' );
		$this->rt_base = 'rt-pagepiling-slider';
		parent::__construct( $data, $args );
	}
	
	public function get_post_template( $type = 'page' ) {
    $posts = get_posts(
      array(
        'post_type'      => 'elementor_library',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => '-1',
        'tax_query'      => array(
          array(
            'taxonomy' => 'elementor_library_type',
            'field'    => 'slug',
            'terms'    => $type,
          ),
        ),
      )
    );
    $templates = array();
    foreach ( $posts as $post ) {
      $templates[] = array(
        'id'   => $post->ID,
        'name' => $post->post_title,
      );
    }

    return $templates;
  }
  public function get_saved_data( $type = 'section' ) {
    $saved_widgets = $this->get_post_template( $type );
    $options[-1]   = __( 'Select', 'neuzin-core' );
    if ( count( $saved_widgets ) ) {
      foreach ( $saved_widgets as $saved_row ) {
        $options[ $saved_row['id'] ] = $saved_row['name'];
      }
    } else {
      $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'neuzin-core' );
    }
    return $options;
  }
  public function get_content_type() {
    $content_type = array(
      'content'              => __( 'Content', 'neuzin-core' ),
      'saved_rows'           => __( 'Saved Section', 'neuzin-core' ),
      'saved_page_templates' => __( 'Saved Page', 'neuzin-core' ),
    );
    return $content_type;
  }
  
	private function rt_load_scripts(){
		wp_enqueue_style( 'jquery-pagepiling' );
		wp_enqueue_script( 'jquery-pagepiling');		
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'content_tab',
            [
                'type' => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Template', 'neuzin-core' ),
                'options' => $this->get_saved_data('section'),
            ]
    );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'neuzin-core' ),
			),			 
			/*Pagepiling Slider( tab Multi )*/
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'pagepiling_lists',
				'label'   => esc_html__( 'Add as many item as you want', 'neuzin-core' ),
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
		
		$this->rt_load_scripts();
		$template = 'pagepiling-slider';

		return $this->rt_template( $template, $data );
	}
}