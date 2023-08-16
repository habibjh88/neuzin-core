<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use NeuzinTheme;
use NeuzinTheme_Helper;
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
		$btn = '<a class="button-gradient-1" ' . $attr . '>' . $data['button_one'] . '<i class="flaticon-next"></i>' . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill" ' . $attr . '>' . $data['button_one'] . '<i class="flaticon-next"></i>' . '</a>';
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
	<?php switch ( $data['theme'] ) {
		case 'leftimg': ?>
		<div class="rtin-item left-image <?php echo esc_attr( $data['animation_display'] ); ?>">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="about-image">
						<?php echo wp_kses_post($getimg);?>				
					</div>
				</div>
				<div class="col-lg-6 col-12">
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
			</div>
			<div class="indicator-container <?php echo esc_attr( $data['animation_display'] ); ?>">
				<div class="indicator-wrap">
					<svg class="dash-left" width="675" height="206">
					<g fill="none" stroke-width="2">
					<path class="dashed1" stroke="rgba(17, 17, 17, 0.3)" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M3.000,0.995 L3.000,100.997 L673.000,101.994 L673.000,207.995" />
					<path class="dashed2" stroke="white" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M3.000,0.995 L3.000,100.997 L673.000,101.994 L673.000,207.995" />
					</g>
					</svg>
					<div class="indicator-img-right">
						<div class="translate-top-50 opacity-animation transition-100 transition-delay-2500">
							<img width="42px" height="53px" loading="lazy" src="<?php echo NEUZIN_ASSETS_URL .'element/element2.png'; ?>" alt="element">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php break;
		case 'rightimg': ?>
		<div class="rtin-item right-image <?php echo esc_attr( $data['animation_display'] ); ?>">
			<div class="row">
				<div class="col-lg-6 col-12 order-lg-2">
					<div class="about-image">
						<?php echo wp_kses_post($getimg);?>				
					</div>
				</div>
				<div class="col-lg-6 col-12 order-lg-1">
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
			</div>
			<div class="indicator-container <?php echo esc_attr( $data['animation_display'] ); ?>">
				<div class="indicator-wrap">
					<svg class="dash-right" width="675" height="206">
					<g fill="none" stroke-width="2">
					<path class="dashed1" stroke="rgba(17, 17, 17, 0.3)" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M673.000,0.995 L673.000,100.996 L3.000,101.996 L3.000,207.996" />
					<path class="dashed2" stroke="white" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M673.000,0.995 L673.000,100.996 L3.000,101.996 L3.000,207.996" />
					</g>
					</svg>
					<div class="indicator-img-left">
						<div class="translate-top-75 opacity-animation transition-100 transition-delay-2500">
							<img width="42px" height="53px" loading="lazy" src="<?php echo NEUZIN_ASSETS_URL .'element/element2.png'; ?>" alt="element">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php break;
		default: ?>
		<div class="rtin-item left-image <?php echo esc_attr( $data['animation_display'] ); ?>">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="about-image">
						<?php echo wp_kses_post($getimg);?>				
					</div>
				</div>
				<div class="col-lg-6 col-12">
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
			</div>
			<div class="indicator-container <?php echo esc_attr( $data['animation_display'] ); ?>">
				<div class="indicator-wrap">
					<svg class="dash-left" width="675" height="206">
					<g fill="none" stroke-width="2">
					<path class="dashed1" stroke="rgba(17, 17, 17, 0.3)" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M3.000,0.995 L3.000,100.997 L673.000,101.994 L673.000,207.995" />
					<path class="dashed2" stroke="white" stroke-dasharray="6, 6" stroke-linecap="butt" stroke-linejoin="miter" d="M3.000,0.995 L3.000,100.997 L673.000,101.994 L673.000,207.995" />
					</g>
					</svg>
					<div class="indicator-img-right">
						<div class="translate-top-50 opacity-animation transition-100 transition-delay-2500">
							<img width="42px" height="53px" loading="lazy" src="<?php echo NEUZIN_ASSETS_URL .'element/element2.png'; ?>" alt="element">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php break;			
	} ?>
</div>