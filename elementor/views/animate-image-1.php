<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use NeuzinTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}

if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="default-animate-image animate-image-<?php echo esc_attr( $data['style'] ); ?>">
		<div class="figure-holder">
			<div class="animated-bg translate-left-75 opacity-animation transition-200 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
				<svg width="638px" height="514px">
					<path fill-rule="evenodd"  opacity="0.031" fill="rgb(2, 86, 225)"
					d="M256.191,-0.005 C397.682,-0.005 406.513,181.938 525.597,258.322 C824.664,450.157 454.262,521.729 256.191,512.196 C114.864,505.394 -0.000,397.536 -0.000,256.097 C-0.000,114.655 114.701,-0.005 256.191,-0.005 Z"/>
				</svg>
			</div>
			<div class="animated-figure translate-left-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 1000);?>">
				<?php echo wp_kses_post($getimg);?>
			</div>
		</div>
	</div>
</div>