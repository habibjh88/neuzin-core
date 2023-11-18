<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use \RT_Posts;
use devofwp\Neuzin\Theme;


if ( ! class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = [
	'neuzin_team'      => [
		'title'           => __( 'Team Member', 'neuzin-core' ),
		'plural_title'    => __( 'Team Members', 'neuzin-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => [
			'menu_name' => __( 'Team', 'neuzin-core' ),
		],
		'rewrite'         => Theme::neuzin_options( 'team_slug' ),
		'supports'        => [ 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ]
	],
	'neuzin_service'   => [
		'title'        => __( 'Service', 'neuzin-core' ),
		'plural_title' => __( 'Services', 'neuzin-core' ),
		'menu_icon'    => 'dashicons-book',
		'rewrite'      => Theme::neuzin_options( 'service_slug' ),
		'supports'     => [ 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ],
	],
	'neuzin_portfolio' => [
		'title'        => __( 'Portfolio', 'neuzin-core' ),
		'plural_title' => __( 'Portfolios', 'neuzin-core' ),
		'menu_icon'    => 'dashicons-book',
		'rewrite'      => Theme::neuzin_options( 'portfolio_slug' ),
		'supports'     => [ 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ],
		'taxonomies'   => [ 'post_tag' ],
	],
	'neuzin_testim'    => [
		'title'        => __( 'Testimonial', 'neuzin-core' ),
		'plural_title' => __( 'Testimonials', 'neuzin-core' ),
		'menu_icon'    => 'dashicons-awards',
		'rewrite'      => Theme::neuzin_options( 'testimonial_slug' ),
		'supports'     => [ 'title', 'thumbnail', 'editor', 'page-attributes' ]
	],
];

$taxonomies = [
	'neuzin_team_category'        => [
		'title'        => __( 'Team Category', 'neuzin-core' ),
		'plural_title' => __( 'Team Categories', 'neuzin-core' ),
		'post_types'   => 'neuzin_team',
		'rewrite'      => [ 'slug' => Theme::neuzin_options( 'team_cat_slug' ) ],
	],
	'neuzin_service_category'     => [
		'title'        => __( 'Service Category', 'neuzin-core' ),
		'plural_title' => __( 'Service Categories', 'neuzin-core' ),
		'post_types'   => 'neuzin_service',
		'rewrite'      => [ 'slug' => Theme::neuzin_options( 'service_cat_slug' ) ],
	],
	'neuzin_portfolio_category'   => [
		'title'        => __( 'Portfolio Category', 'neuzin-core' ),
		'plural_title' => __( 'Portfolio Categories', 'neuzin-core' ),
		'post_types'   => 'neuzin_portfolio',
		'rewrite'      => [ 'slug' => Theme::neuzin_options( 'portfolio_cat_slug' ) ],
	],
	'neuzin_testimonial_category' => [
		'title'        => __( 'Testimonial Category', 'neuzin-core' ),
		'plural_title' => __( 'Testimonial Categories', 'neuzin-core' ),
		'post_types'   => 'neuzin_testim',
		'rewrite'      => [ 'slug' => Theme::neuzin_options( 'testim_cat_slug' ) ],
	],
];

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );