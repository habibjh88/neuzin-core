<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use devofwp\Neuzin\Theme;
use devofwp\Neuzin\Helper;
use \WP_Query;

$prefix      = NEUZIN_CORE_THEME_PREFIX;
$thumb_size  = 'neuzin-size5';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'neuzin_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
	'paged' => $paged
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
$temp = Helper::wp_set_temp_query( $query );

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="team-default team-multi-layout-3 team-grid-<?php echo esc_attr( $data['style'] );?>">
		<div class="row auto-clear">
			<?php $i = $data['delay']; if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();
				$id            	= get_the_id();
				$designation   	= get_post_meta( $id, 'neuzin_team_designation', true );
				$socials       	= get_post_meta( $id, 'neuzin_team_socials', true );
				$social_fields 	= Helper::team_socials();
				if ( $data['contype'] == 'content' ) {
					$content = apply_filters( 'the_content', get_the_content() );
				}
				else {
					$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
				}
				$content = wp_trim_words( $content, $data['count'], '' );
				$content = "<p>$content</p>";
			?>
			<div class="rtin-item <?php echo esc_attr( $col_class );?>">
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
									if ( !empty( Theme::neuzin_options('no_preview_image')['id'] ) ) {
										echo wp_get_attachment_image( Theme::neuzin_options('no_preview_image')['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . Helper::get_img( 'noimage_520X562.jpg' ) . '" alt="'.get_the_title().'">';
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
				<?php $i = $i + 500; } ?>
			<?php } ?>
		</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="team-button"><a class="button-gradient-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="flaticon-next"></i></a></div>
			<?php } ?>
		<?php } else { ?>
			<?php Helper::pagination(); ?>
		<?php } ?>
		<?php Helper::wp_reset_temp_query( $temp ); ?>
	</div>
</div>