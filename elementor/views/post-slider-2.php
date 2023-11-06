<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

use NeuzinTheme;
use NeuzinTheme_Helper;
use \WP_Query;

$neuzin_has_entry_meta  = ( $data['post_grid_date'] == 'yes' || $data['post_grid_author'] == 'yes' || $data['post_grid_category'] == 'yes' || $data['post_grid_comment'] == 'yes' ) ? true : false;


$thumb_size = 'neuzin-size3';

$args = array(
	'posts_per_page' 	=> $data['itemlimit'],
	'cat'            	=> (int) $data['cat'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
);

$query = new WP_Query( $args );
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="post-default post-grid-style5 rt-owl-nav-2 owl-wrap post-slider-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$content = NeuzinTheme_Helper::get_current_post_content();
				$content = wp_trim_words( get_the_excerpt(), $data['count'], '' );
				$content = "<p>$content</p>";
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				
				$neuzin_comments_number = number_format_i18n( get_comments_number() );
				$neuzin_comments_html = $neuzin_comments_number == 1 ? esc_html__( 'Comment' , 'neuzin-core' ) : esc_html__( 'Comments' , 'neuzin-core' );
				$neuzin_comments_html = '<span class="comment-number">'. $neuzin_comments_number .'</span> '. $neuzin_comments_html;
				
				$neuzin_time_html = sprintf( '<span><span>%s</span><br>%s<br>%s<br></span>', get_the_time( 'd' ),get_the_time( 'M' ), get_the_time( 'Y' ) );

				?>
				<div class="rtin-item">
					<div class="rtin-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( NeuzinTheme::neuzin_options('no_preview_image')['id'] ) ) {
										echo wp_get_attachment_image( NeuzinTheme::neuzin_options('no_preview_image')['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_530X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
							?>
						</a>
					</div>
					<div class="rtin-content">
						<?php if ( $neuzin_has_entry_meta ) { ?>
						<ul class="post-grid-meta">
							<?php if ( $data['post_grid_date'] == 'yes' ) { ?>
							<li class="blog-date"><?php echo get_the_date(); ?></li>
							<?php } if ( $data['post_grid_author'] == 'yes' ) { ?>
							<li class="author-meta"><?php esc_html_e( 'By ', 'neuzin-core' );?><?php the_author_posts_link(); ?></li>
							<?php } if ( $data['post_grid_category'] == 'yes' ) { ?>
							<li class="blog-cat"><?php echo the_category( ' ' );?></li>
							<?php } if ( $data['post_grid_comment'] == 'yes' ) { ?>
							<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses_post( $neuzin_comments_html );?></a></li>							
							<?php } ?>
						</ul>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
						<?php echo wp_kses_post( $content );?>
						<?php } ?>
						<?php if ( $data['read_display'] == 'yes' ) { ?>
						<a class="button-1" href="<?php the_permalink();?>"><?php echo esc_html( $data['buttontext'] );?><i class="flaticon-next"></i></a>
						<?php } ?>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
	<?php wp_reset_postdata();?>
	</div>
</div>