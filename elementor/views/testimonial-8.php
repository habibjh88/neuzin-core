<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use NeuzinTheme;
use NeuzinTheme_Helper;
use \WP_Query;

$args = array(
	'post_type'      => 'neuzin_testim',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'neuzin_testimonial_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );

$slider_nav_class = $data['slider_nav'] == 'yes' ? ' slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
<div class="default-testimonial rtin-testimonial-8 <?php echo esc_attr( $data['nav_style'] );?> <?php echo esc_attr( $data['nav_position'] );?> owl-wrap <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php $j = $data['delay']; if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id 			= get_the_id();
				$designation 	= get_post_meta( $id, 'neuzin_tes_designation', true );
				$content 		= NeuzinTheme_Helper::get_current_post_content();
				$content 		= wp_trim_words( $content, $data['count'], '' );
				$content 		= "<p>$content</p>";
				$ratting	 	= get_post_meta( $id, 'neuzin_tes_rating', true );
				$rest_testimonial_rating = 5- intval( $ratting ) ;
				?>
				<div class="rtin-item">
					<div class="translate-zoomout-50 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $j );?>">
						<div class="rtin-content">
							<div class="rtin-icon"><i class="flaticon-quote"></i></div>
							<?php echo wp_kses_post( $content ); ?>
							<?php if ( $data['thumbs_display']  == 'yes' ) { ?>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="rtin-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
							<?php } ?>
							<?php } ?>
							<h3 class="rtin-title"><?php the_title(); ?></h3>
							<div class="rtin-designation"><?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><span><?php echo esc_html( $designation );?></span><?php } ?></div>
							<?php if ( $data['ratting_display']  == 'yes' ) { ?>
								<ul class="rating">
									<?php for ($i=0; $i < $ratting; $i++) { ?>
										<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
									<?php } ?>			
									<?php for ($i=0; $i < $rest_testimonial_rating; $i++) { ?>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>					
						<ul class="shape-wrap">
							<li>
								<svg width="479px" height="407px">
								<path fill-rule="evenodd"  fill="rgb(90, 73, 248)" d="M65.116,340.507 C84.018,359.068 105.898,374.118 129.182,385.513 C140.331,390.971 152.431,395.446 165.194,398.873 C212.925,411.683 269.935,409.831 321.283,389.907 C340.401,382.488 358.732,372.566 375.508,359.962 C385.164,352.708 394.304,344.567 402.780,335.504 C405.450,332.650 408.054,329.705 410.588,326.666 C422.723,312.117 434.636,296.676 445.034,279.548 C464.134,248.078 478.116,210.903 478.964,163.049 C479.205,149.440 478.164,135.526 472.751,122.875 C466.349,107.917 455.456,98.837 442.055,93.528 C430.317,88.878 416.655,87.123 402.400,86.848 C389.087,86.590 375.260,87.624 362.003,88.799 C350.649,89.803 339.839,90.002 329.466,89.270 C290.699,86.532 258.044,70.782 226.021,35.478 C206.066,13.479 184.848,3.809 164.351,0.955 C143.155,-1.998 122.729,2.338 105.260,7.868 C87.418,13.516 66.204,24.990 47.507,44.850 C36.989,56.021 27.268,69.845 19.392,86.779 C13.763,98.881 9.078,112.571 5.719,128.014 C2.921,140.873 1.041,154.948 0.303,170.335 C-1.515,208.206 5.005,241.910 17.532,271.238 C28.976,298.032 45.430,321.174 65.116,340.507 Z"/>
								</svg>
							</li>
						</ul>
					</div>
				</div>
			<?php $j = $j + 500; endwhile;?>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
</div>
</div>