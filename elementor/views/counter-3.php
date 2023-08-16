<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use Elementor\Utils;
extract($data);

?>
<div class="section-title-holder <?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="rt-counter rtin-counter-<?php echo esc_attr( $data['style'] );?> rtin-<?php echo esc_attr( $data['iconalign'] );?>">
		<div class="translate-zoomout-50 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
			<div class="rtin-item">		
				<div class="rtin-content">
					<div class="rtin-counter"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span></div>
					<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
				</div>	
			</div>
		</div>
	</div>
</div>
