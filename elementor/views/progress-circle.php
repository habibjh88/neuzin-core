<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
?>

<div class="progress-circular-layout">
	<div class="progress-circular">
		<input type="text" class="knob knob-percent dial" value="0" data-max="100" data-rel="<?php echo esc_attr( $data['number'] );?>" 
		data-linecap="solid" data-width="<?php echo esc_attr( $data['circle_width'] );?>" data-height="<?php echo esc_attr( $data['circle_height'] );?>" data-bgcolor="<?php echo esc_attr( $data['bgcolor_color'] );?>" data-fgcolor="<?php echo esc_attr( $data['fgcolor_color'] );?>" data-thickness="<?php echo esc_attr( $data['circle_border'] );?>" data-readonly="true" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>" disabled>
		<div class="rtin-unit"><?php echo wp_kses_post( $data['mbps'] );?></div>
	</div>
	<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
</div>