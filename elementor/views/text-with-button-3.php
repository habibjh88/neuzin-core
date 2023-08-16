<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

$btn = $btn2 = $attr = $attr2 = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}
if ( !empty( $data['two_buttonurl']['url'] ) ) {
	$attr2  = 'href="' . $data['two_buttonurl']['url'] . '"';
	$attr2 .= !empty( $data['two_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr2 .= !empty( $data['two_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( $data['button_style'] == 'neuzin-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-light" ' . $attr . '>' . '<i class="fab fa-apple"></i>' . $data['button_one'] . '</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="button-gradient-1" ' . $attr . '>' . $data['button_one'] . '<i class="flaticon-next"></i>' . '</a>';
	}
}
if ( $data['button_style_two'] == 'neuzin-button-1' ) {
	if ( !empty( $data['button_two'] ) ) {
		$btn2 = '<a class="btn-light" ' . $attr2 . '>' . '<img src="' . NEUZIN_IMG_URL . '/google-app.png" alt="google">' . $data['button_two'] . '</a>';
	}
} else {
	if ( !empty( $data['button_two'] ) ) {
		$btn2 = '<a class="btn-ghost" ' . $attr2 . '>' . $data['button_two'] . '<i class="flaticon-next"></i>' . '</a>';
	}
}
?>
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
			<div class="rtin-button">
				<?php if ( !empty( $data['button_one'] ) ) { ?><?php echo wp_kses_post( $btn );?><?php } ?>
				<?php if ( !empty( $data['button_two'] ) ) { ?><?php echo wp_kses_post( $btn2 );?><?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>