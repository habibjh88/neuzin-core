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
			<div class="translate-zoomout-50 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
				<?php echo wp_kses_post($getimg);?>
				<ul class="inner-shape">
					<li>
						<div class="translate-top-50 opacity-animation transition-100 transition-delay-<?php echo esc_attr( $data['delay'] + 1200);?>">
							<img src="<?php echo NEUZIN_ASSETS_URL . 'element/element50.png'; ?>" alt="element">
						</div>
					</li>
					<li>
						<div class="translate-bottom-left-50 opacity-animation transition-100 transition-delay-<?php echo esc_attr( $data['delay'] + 1500);?>">
							<img src="<?php echo NEUZIN_ASSETS_URL . 'element/element51.png'; ?>" alt="element">
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>