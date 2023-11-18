<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

use devofwp\Neuzin\Theme;
use devofwp\Neuzin\Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'neuzin-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="button-gradient-1" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill" ' . $attr . '>' . $data['button_one'] . '</a>';
	}
}
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}
?>
<div class="about-image-text about-layout-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="rtin-item <?php echo esc_attr( $data['animation_display'] ); ?>">
		<div class="single-item">
			<div class="about-content">
				<?php if ( !empty( $data['sub_title'] ) ) { ?>
					<span class="sub-rtin-title"><?php echo wp_kses_post( $data['sub_title'] );?></span>
				<?php } ?>
				<?php if ( !empty( $data['title'] ) ) { ?>
					<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<?php } ?>
				<?php if ( !empty( $data['content'] ) ) { ?>
					<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
				<?php } ?>
				<?php if ( $data['button_display']  == 'yes' ) { ?>
					<?php if ( $btn ) { ?>
						<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="single-item">
			<div class="translate-right-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay']);?>">
				<div class="about-image">
					<?php echo wp_kses_post($getimg);?>				
				</div>
			</div>
		</div>
	</div>
</div>