<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use devofwp\Neuzin\Helper;
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

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="button-1" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="info-box-default info-box-<?php echo esc_attr( $data['style'] );?>">
			<div class="rtin-item rtin-<?php echo esc_attr( $data['icontype'] );?>" >
				<div class="rtin-content">
					<?php if ( !empty( $data['title'] ) ) { ?>
					<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
					<?php } if ( !empty( $data['content'] ) ) { ?>
					<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>
					<?php } ?>
					<?php if ( !empty( $btn ) ){ ?>
						<div class="info-box-button"><?php echo wp_kses_post( $btn );?></div>		
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>