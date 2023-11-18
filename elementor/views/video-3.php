<?php
/**
 * @author  DevOfWP
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
		<div class="rtin-video">
			<div class="animated-bg">
				<div class="translate-left-75 opacity-animation transition-200 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
					<svg width="1011px" height="793px">
						<path fill-rule="evenodd"  fill="rgb(248, 247, 254)"
						d="M265.339,499.191 C290.475,564.630 152.429,680.677 258.786,767.767 C357.678,848.744 440.244,712.358 565.072,670.825 C628.377,649.761 702.991,694.926 784.442,667.876 C1013.233,591.893 1073.837,334.328 942.926,182.770 C795.118,11.649 578.741,19.692 480.823,86.161 C369.882,161.472 302.205,41.329 252.768,14.176 C131.855,-52.233 -45.913,128.863 10.910,264.359 C75.208,417.683 211.867,359.981 265.339,499.191 Z"/>
					</svg>
				</div>
			</div>
			<div class="animated-figure">
				<div class="translate-left-75 opacity-animation transition-200 transition-delay-<?php echo esc_attr( $data['delay'] + 400 );?>">
					<div class="mask-image">
						<?php echo wp_kses_post($getimg);?>
						<div class="item-icon">
							<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>