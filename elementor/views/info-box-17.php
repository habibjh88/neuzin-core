<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;
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
else {
	$title = $data['title'];
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="button-1" ' . $attr . '>' . $data['buttontext'] . '<i class="flaticon-next"></i>' . '</a>';
}
// icon , image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}
$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="info-box-default info-box-<?php echo esc_attr( $data['style'] );?>">
			<div class="rtin-item">
				<div class="icon-holder">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="349" height="274.03" viewBox="0 0 349 274.03">
					  <path d="M336.854,103.355 C316.561,64.768 280.383,33.330 237.532,14.823 C93.822,-47.243 -33.268,98.383 7.834,221.218 C14.946,242.470 28.550,264.286 51.748,271.532 C77.785,279.663 105.974,266.646 127.647,251.272 C149.320,235.898 169.789,217.135 196.550,211.248 C241.350,201.393 285.421,227.460 324.798,195.003 C355.985,169.297 353.586,135.171 336.854,103.355 Z" class="cls-1"/>
					</svg>
					<div class="rtin-icon">
						<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
							<?php echo wp_kses_post($getimg);?>  
						<?php }else{?> 	
						<?php if ( $final_icon_image_url ): ?>
							<span class="svg-img"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
						<?php else: ?>
							<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
						<?php endif ?>
						<?php }  ?>
					</div>
				</div>
				<div class="rtin-content">
					<?php if ( !empty( $data['title'] ) ) { ?>
					<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
					<?php } if ( !empty( $data['content'] ) ) { ?>
					<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
					<?php } ?>
					<?php if ( !empty( $btn ) ){ ?>
						<div class="info-box-button"><?php echo wp_kses_post( $btn );?></div>		
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

