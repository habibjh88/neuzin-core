<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;
use NeuzinTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use devofwp\Lib\WP_SVG;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
}
else {
	$title = $data['title'];
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-top-50 opacity-animation transition-50 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="info-box-default info-box-<?php echo esc_attr( $data['style'] );?>">
			<div class="rtin-item">
				<div class="rtin-content">
					<?php if ( !empty( $data['title'] ) ) { ?>
					<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
					<?php } if ( !empty( $data['content'] ) ) { ?>
					<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>