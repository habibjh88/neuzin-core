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
	'post_type' => 'neuzin_portfolio',
	'post_status' => 'publish',
	'orderby' => $post_sorting,
	'order' => $post_ordering,
	'posts_per_page' => $number_of_post,
	'paged'          => $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'neuzin_portfolio_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$query = new WP_Query( $args );
$temp = NeuzinTheme_Helper::wp_set_temp_query( $query );

$title_css ='';
$title_size = $data['title_size'];

if ( $title_size != '' ) {
   $title_size       = (int) $title_size;
   $title_css  .= "font-size: {$title_size}px;";
}

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="<?php if ( $data['animation_display'] == 'yes' ) { ?>has-animation<?php } else { ?>no-animation<?php } ?>">
	<div class="portfolio-default portfolio-multi-layout-4 portfolio-grid-<?php echo esc_attr( $data['layout'] );?>">
		<div class="row <?php echo esc_attr( $gap_class ); ?>">	
			<?php $j = $data['delay'];
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
					$query->the_post();			
					$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
					$portfolio_title = wp_trim_words( get_the_title(), $title_count, '' );
			?>
			<div class="<?php echo esc_attr( $col_class ) ?>">
				<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $j );?>">
					<div class="rtin-item">
						<div class="rtin-figure">
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
									} else {
										if ( !empty( NeuzinTheme::neuzin_options('no_preview_image')['id'] ) ) {
											echo wp_get_attachment_image( NeuzinTheme::neuzin_options('no_preview_image')['id'], $thumb_size );
										} else {
											echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_640X471.jpg' ) . '" alt="'.get_the_title().'">';
										}
									}
								?>
							</a>
						</div>
						<div class="rtin-content">
							<div class="rtin-icon"><a href="<?php the_permalink(); ?>"><i class="fas fa-plus" aria-hidden="true"></i></a></div>
							<h3 class="rtin-title" style="<?php echo wp_kses_post( $title_css ); ?>"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $portfolio_title );?></a></h3>
							<?php if ( $data['cat_display'] == 'yes' ) { ?>
							<div class="rtin-cat"><?php
								$i = 1;
								$term_lists = get_the_terms( get_the_ID(), 'neuzin_portfolio_category' );
								foreach ( $term_lists as $term_list ){ 
								$link = get_term_link( $term_list->term_id, 'neuzin_portfolio_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
							<?php } ?>
							<?php if ( $data['excerpt_display'] == 'yes' ) { ?>
							<p><?php echo wp_kses_post( $excerpt );?></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php $j = $j + 500; } ?>
		<?php } ?>
		</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="portfolio-button"><a class="button-gradient-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="flaticon-next"></i></a></div>
			<?php } ?>
		<?php } else { ?>
			<?php NeuzinTheme_Helper::pagination(); ?>
		<?php } ?>
		<?php NeuzinTheme_Helper::wp_reset_temp_query( $temp ); ?>
	</div>
</div>