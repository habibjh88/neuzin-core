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
				<svg width="691px" height="733px">
					<path fill-rule="evenodd" opacity="0.051" fill="rgb(255, 197, 4)"
					d="M129.222,271.913 C212.230,241.967 271.998,249.153 305.875,126.405 C347.835,-25.639 488.526,-30.969 534.149,59.618 C571.338,133.456 522.405,159.532 539.194,273.262 C548.450,335.961 564.686,343.229 614.968,352.282 C707.535,368.947 715.080,451.342 640.312,471.810 C561.945,493.263 485.477,535.574 536.377,629.244 C585.869,720.326 451.599,788.230 384.363,669.559 C332.649,578.284 335.429,531.755 138.737,536.091 C0.024,539.148 -83.418,348.624 129.222,271.913 Z"/>
				</svg>
			</div>
			<div class="animated-figure translate-left-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 1000);?>">
				<?php echo wp_kses_post($getimg);?>
			</div>
		</div>
	</div>
</div>