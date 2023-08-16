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
			<div class="animated-bg translate-right-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
				<svg width="993px" height="698px">
					<path fill-rule="evenodd"  opacity="0.502" fill="rgb(240, 246, 254)"
					d="M615.878,633.346 C421.616,682.785 207.128,731.954 63.989,573.875 C-94.294,399.069 67.235,87.796 264.299,20.945 C414.319,-29.945 599.731,16.820 724.612,108.132 C826.171,182.390 906.437,307.315 953.564,424.057 C964.863,452.047 974.424,490.636 972.447,520.765 C970.471,550.894 1010.875,682.567 983.375,694.964 C943.433,712.968 842.741,645.666 801.432,631.106 C744.184,610.931 681.174,616.728 615.878,633.346 Z"/>
				</svg>
			</div>
			<div class="animated-figure translate-right-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 1000);?>">
				<?php echo wp_kses_post($getimg);?>
			</div>
		</div>
	</div>
</div>