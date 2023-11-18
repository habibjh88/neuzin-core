<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

$btn = $btn2 = $attr = $attr2 = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}
if ( !empty( $data['two_buttonurl']['url'] ) ) {
	$attr2  = 'href="' . $data['two_buttonurl']['url'] . '"';
	$attr2 .= !empty( $data['two_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr2 .= !empty( $data['two_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( $data['button_style'] == 'neuzin-button-1' ) {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . $data['buttontext'] . '</a>';
	}
} else {
	if ( !empty( $data['buttontext'] ) ) {
		$btn = '<a class="button-gradient-1" ' . $attr . '>' . $data['buttontext'] . '</a>';
	}
}
if ( $data['two_button_style'] == 'neuzin-button-1' ) {
	if ( !empty( $data['two_buttontext'] ) ) {
		$btn2 = '<a class="btn-light btn-light-2" ' . $attr2 . '>' . $data['two_buttontext'] . '</a>';
	}
} else {
	if ( !empty( $data['two_buttontext'] ) ) {
		$btn2 = '<a class="btn-ghost" ' . $attr2 . '>' . $data['two_buttontext'] . '</a>';
	}
}

?>
<div class="rt-el-cta cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="container">
		<div class="align-items row">
			<div class="cta-content col-lg-7">
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<p><?php echo wp_kses_post( $data['content'] );?></p>
			</div>			
			<div class="rtin-button col-lg-5">
				<?php if ( !empty( $data['buttontext'] ) ) { ?><?php echo wp_kses_post( $btn );?><?php } ?>
				<?php if ( !empty( $data['two_buttontext'] ) ) { ?><?php echo wp_kses_post( $btn2 );?><?php } ?>
			</div>
			
			
		</div>		
	</div>
</div>