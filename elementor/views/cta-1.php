<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

$btn = $attr = '';

if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
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

?>
<div class="rt-el-cta cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="container">
		<div class="align-items row">
			<div class="cta-content col-lg-7">
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<p><?php echo wp_kses_post( $data['content'] );?></p>
			</div>
			<?php if ( $btn ) { ?>
				<div class="rtin-button col-lg-5"><?php echo wp_kses_post( $btn );?></div>		
			<?php } ?>
		</div>		
	</div>
</div>