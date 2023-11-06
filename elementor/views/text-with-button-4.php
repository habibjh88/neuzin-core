<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( $data['button_style'] == 'neuzin-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="button-1" ' . $attr . '>' . $data['button_one'] . '<i class="flaticon-next"></i>' . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-ghost" ' . $attr . '>' . $data['button_one'] . '<i class="flaticon-next"></i>' .  '</a>';
	}
}
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="section-title-holder <?php echo esc_attr( $data['animation_display'] ); ?>">
		<div class="title-text-button title-text-<?php echo esc_attr( $data['style'] ); ?>">		
			<?php if ( !empty( $data['sub_title'] ) ) { ?>
			<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
				<div class="subtitle"><?php echo wp_kses_post( $data['sub_title'] );?></div>
			</div>
			<?php } ?>
			<?php if ( !empty( $data['title'] ) ) { ?>
			<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 400 );?>">
				<<?php echo esc_html( $data['title_tag'] ); ?> class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_html( $data['title_tag'] ); ?>>
			</div>
			<?php } ?>
			<?php if ( !empty( $data['content'] ) ) { ?>
			<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 900 );?>">
				<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
			</div>
			<?php } ?>		
			<?php if ( $data['button_display']  == 'yes' ) { ?>
			<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] + 1400 );?>">
				<?php if ( $btn ) { ?>
					<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>