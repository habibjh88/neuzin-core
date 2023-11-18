<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use devofwp\Neuzin\Helper;
use Elementor\Utils;
use devofwp\Lib\WP_SVG;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
}
else {
	$title = $data['title'];
}
// icon , image

$final_icon_class       = " fa fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="working-process-default working-process-<?php echo esc_attr( $data['style'] );?>">
		<?php switch ( $data['theme'] ) {
			case 'lefticon': ?>
				<div class="rtin-item left-icon">
					<div class="rtin-flex">
						<div class="rtin-icon">			
							<?php if ( $final_icon_image_url ): ?>
								<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
							<?php else : ?>
								<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
							<?php endif ?>
						</div>
						<div class="rtin-content">
							<?php if ( !empty( $data['title'] ) ) { ?>
							<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
							<?php } if ( !empty( $data['content'] ) ) { ?>
							<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
							<?php } ?>
						</div>
					</div>
					<svg x="0px" y="0px" width="312px" height="130px">
						<path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338"/>
						<path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338 "/>
					</svg>
				</div>
			<?php break;
			case 'righticon': ?>
				<div class="rtin-item right-icon">
					<div class="rtin-flex">
						<div class="rtin-icon">			
							<?php if ( $final_icon_image_url ): ?>
								<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
							<?php else : ?>
								<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
							<?php endif ?>
						</div>
						<div class="rtin-content">
							<?php if ( !empty( $data['title'] ) ) { ?>
							<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
							<?php } if ( !empty( $data['content'] ) ) { ?>
							<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
							<?php } ?>
						</div>
					</div>
					<svg x="0px" y="0px" width="312px" height="130px">
						<path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M311.000,0.997 C311.000,0.997 313.123,123.592 214.535,79.996 C214.535,79.996 41.149,20.122 3.377,125.996"/>
						<path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M311.000,0.997 C311.000,0.997 313.123,123.592 214.535,79.996 C214.535,79.996 41.149,20.122 3.377,125.996"/>
					</svg>	
				</div>
			<?php break;
			default: ?>
				<div class="rtin-item left-icon">
					<div class="rtin-flex">
						<div class="rtin-icon">			
							<?php if ( $final_icon_image_url ): ?>
								<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
							<?php else : ?>
								<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
							<?php endif ?>
						</div>
						<div class="rtin-content">
							<?php if ( !empty( $data['title'] ) ) { ?>
							<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
							<?php } if ( !empty( $data['content'] ) ) { ?>
							<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
							<?php } ?>
						</div>
					</div>
					<svg x="0px" y="0px" width="312px" height="130px">
						<path class="dashed1" fill="none" stroke="rgb(95, 93, 93)" stroke-width="1" stroke-dasharray="1300" stroke-dashoffset="0" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338"/>
						<path class="dashed2" fill="none" stroke="#ffffff" stroke-width="2" stroke-dasharray="6" stroke-dashoffset="1300" d="M3.121,2.028 C3.121,2.028 1.003,124.928 99.352,81.226 C99.352,81.226 272.319,21.200 310.000,127.338 "/> -->
					</svg>
				</div>
			<?php break;
		} ?>
	</div>
</div>