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

$thumb_size = 'neuzin-size5';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$number_of_post = $data['itemnumber'];
$post_sorting = $data['orderby'];
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];	
$cat_single_grid = $data['cat_single'];
$args = array(
	'post_type' 		=> 'neuzin_service',
	'post_status' 		=> 'publish',
	'orderby' 			=> $post_sorting,
	'order' 			=> $post_ordering,
	'posts_per_page' 	=> $number_of_post,
	'paged'          	=> $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'neuzin_service_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$query = new WP_Query( $args );
$temp = NeuzinTheme_Helper::wp_set_temp_query( $query );

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="service-default service-grid-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $gap_class ); ?> rt-masonry-grid">	
		<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt 				= wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$portfolio_title 		= wp_trim_words( get_the_title(), $title_count, '' );
				$neuzin_service_icon   	= get_post_meta( get_the_ID(), 'neuzin_service_icon', true );
				$neuzin_service_img   	= get_post_meta( get_the_ID(), 'neuzin_service_img', true );
				$icon_class = '' ;
				if ( empty( $neuzin_service_icon ) && empty( $neuzin_service_img )  ) {
					$icon_class = ' no-icon';	
				}
		?>
		<div class="<?php echo esc_attr( $col_class ) ?> rt-grid-item">
			<div class="rtin-item <?php echo esc_attr( $icon_class ); ?>">
				<div class="rtin-content">
					<?php if (!empty( $neuzin_service_icon ) || !empty( $neuzin_service_img )) { ?>
					<div class="rtin-icon">
						<?php if ( $neuzin_service_img ) : ?>
							<span><?php echo wp_get_attachment_image( $neuzin_service_img, 'full' );?></span>
						<?php else: ?>
							<span><i class="<?php echo wp_kses_post( $neuzin_service_icon );?>"></i></span>
						<?php endif; ?>
					</div>
					<?php } ?>
					<h3 class="rtin-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $portfolio_title );?></a></h3>
					<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
					<p><?php echo wp_kses_post( $excerpt );?></p>
					<?php } ?>
					<?php if ( $data['read_display'] == 'yes' ) { ?>
					<div class="rtin-read"><a class="button-1" href="<?php the_permalink(); ?>"><?php echo esc_html( $data['read_more_text'] );?><i class="flaticon-next"></i></a></div>
					<?php } ?>
				</div>
			</div>
		</div>
			
		<?php } ?>
	<?php } ?>
	</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="service-button"><a class="button-gradient-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="flaticon-next"></i></a></div>
			<?php } ?>
		<?php } else { ?>
			<?php NeuzinTheme_Helper::pagination(); ?>
		<?php } ?>
		<?php NeuzinTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>