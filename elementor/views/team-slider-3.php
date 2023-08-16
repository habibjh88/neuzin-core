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

$prefix      = NEUZIN_CORE_THEME_PREFIX;
$thumb_size  = 'neuzin-size5';

$args = array(
	'post_type'      => 'neuzin_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'neuzin_team_category',
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
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
<div class="team-default team-multi-layout-3 rt-owl-nav-2 owl-wrap team-slider-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php $i = $data['delay']; if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id            	= get_the_id();
				$designation   	= get_post_meta( $id, 'neuzin_team_designation', true );
				$socials       	= get_post_meta( $id, 'neuzin_team_socials', true );
				$social_fields 	= NeuzinTheme_Helper::team_socials();
				if ( $data['contype'] == 'content' ) {
				$content = apply_filters( 'the_content', get_the_content() );
				}
				else {
					$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
				}
				$content = wp_trim_words( $content, $data['count'], '' );
				$content = "<p>$content</p>";
				?>
				<div class="rtin-item">
					<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $i );?>">
						<div class="rtin-content-wrap">
							<div class="maks-item animted-bg-wrap">
								<span class="animted-bg"></span>
								<div class="rtin-figure">
									<a href="<?php the_permalink();?>">
									<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									}
									else {
										if ( !empty( NeuzinTheme::neuzin_options('no_preview_image')['id'] ) ) {
											echo wp_get_attachment_image( NeuzinTheme::neuzin_options('no_preview_image')['id'], $thumb_size );
										}
										else {
											echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_520X562.jpg' ) . '" alt="'.get_the_title().'">';
										}
									}
									?>
									</a>
								</div>
							</div>
							<div class="mask-wrap">
								<div class="rtin-content">
									<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if ( $designation && $data['designation_display']  == 'yes' ): ?>
										<div class="rtin-designation"><?php echo esc_html( $designation );?></div>
									<?php endif; ?>
									<?php if ( $data['content_display']  == 'yes' ) { ?>
										<?php echo wp_kses_post( $content );?>
									<?php } ?>
									<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
									<ul class="rtin-social">
										<?php foreach ( $socials as $key => $social ): ?>
											<?php if ( !empty( $social ) ): ?>
												<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $i = $i + 500; endwhile;?>
		<?php endif;?>
		<?php wp_reset_postdata();?>
	</div>
</div>
</div>