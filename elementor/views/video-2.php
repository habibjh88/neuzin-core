<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use devofwp\Neuzin\Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="rt-video video-<?php echo esc_attr( $data['style'] );?>">
		<div class="translate-left-75 opacity-animation transition-200 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
			<div class="rtin-video">
				<div class="item-img">
					<?php echo wp_kses_post($getimg);?>
				</div>
				<div class="popup-img">
					<div class="item-icon">
						<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
						<?php if ( !empty( $data['video_title'] ) ) { ?>
						<h3><?php echo wp_kses_post( $data['video_title'] ); ?></h3>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>