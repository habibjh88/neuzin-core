<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Utils;
extract($data);

$final_icon_class       = " flaticon-rocket";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="section-default-style section-title-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="section-title-holder <?php echo esc_attr( $data['animation_display'] ); ?>">
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
			<<?php echo esc_html( $data['title_tag'] ); ?> class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_html( $data['title_tag'] ); ?>>	
		</div>
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] + 500 );?>">
			<div class="heading-icon">
				<svg class="dash-left" width="100" height="20">
				<g fill="none" stroke-width="4">
				<path class="dashed1" stroke-dasharray="5, 5" d="M5 20 l215 0" />
				<path class="dashed2" stroke="white" stroke-dasharray="5, 5" d="M5 20 l215 0" />
				</g>
				</svg>
				
				<div class="rtin-icon">			
					<?php if ( $final_icon_image_url ): ?>
						<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
					<?php else : ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php endif ?>
				</div>
				
				<svg class="dash-right" width="100" height="20">
				<g fill="none" stroke-width="4">
				<path class="dashed1" stroke-dasharray="5, 5" d="M5 20 l215 0" />
				<path class="dashed2" stroke="white" stroke-dasharray="5, 5" d="M5 20 l215 0" />
				</g>
				</svg>
				
			</div>
		</div>
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] + 1000 );?>">
			<?php if( !empty ( $data['content'] ) ) { ?>
			<p class="sub-text"><?php echo wp_kses_post( $data['content'] ); ?></p>
			<?php } ?>
		</div>
	</div>
</div>
