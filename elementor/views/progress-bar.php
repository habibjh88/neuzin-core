<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

if( $data['bg_shape'] == 'yes' ) {
	$bg_shape = 'bg-shape';
}else {
	$bg_shape = 'no-shape';
}

?>
<div class="rtin-progress-bar <?php echo esc_attr( $bg_shape );?>">
	<h3 class="rtin-name"><?php echo esc_html( $data['title'] );?></h3>
	<div class="progress" style="height:<?php echo esc_html( $data['number_height'] );?>px">
		<div class="progress-bar progress-bar-striped fadeInLeft animated" data-progress="<?php echo esc_attr( $data['number']['size'] );?>%" style="width: <?php echo esc_attr( $data['number']['size'] );?>%;"> <span><?php echo esc_html( $data['number']['size'] );?>%</span></div>
	</div>
</div>