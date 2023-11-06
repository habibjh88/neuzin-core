<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

if ( !empty( $data['sub_title_shape'] == 'yes' ) ) {
	$line_shape = 'sub-title-shape';
}else {
	$line_shape = 'no-shape';
}

?>
<div class="section-default-style section-title-<?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['title_align'] ); ?>">
	<div class="section-title-holder <?php echo esc_attr( $data['animation_display'] ); ?>">	
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
			<?php if( !empty ( $data['sub_title'] ) ) { ?>
			<div class="sub-title <?php echo esc_attr( $line_shape ); ?>"><?php echo wp_kses_post( $data['sub_title'] ); ?></div>
			<?php } ?>
		</div>
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] + 500 );?>">
			<<?php echo esc_html( $data['title_tag'] ); ?> class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_html( $data['title_tag'] ); ?>>
		</div>
		<div class="translate-<?php echo esc_attr( $data['animation'] );?>-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] + 1000 );?>">
			<?php if( !empty ( $data['content'] ) ) { ?>
			<p class="sub-text"><?php echo wp_kses_post( $data['content'] ); ?></p>
			<?php } ?>
		</div>
	</div>
</div>