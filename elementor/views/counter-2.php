<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Utils;
extract($data);

$final_icon_class       = " flaticon-award";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="section-title-holder <?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="rt-counter rtin-counter-<?php echo esc_attr( $data['style'] );?> rtin-<?php echo esc_attr( $data['iconalign'] );?>">
		<div class="translate-zoomout-50 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
			<div class="rtin-item">
				<div class="rtin-icon">			
					<?php if ( $final_icon_image_url ): ?>
						<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
					<?php else : ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php endif ?>
				</div>
				<div class="rtin-content">
					<div class="rtin-counter"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span></div>
					<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
				</div>	
			</div>
		</div>
	</div>
</div>
