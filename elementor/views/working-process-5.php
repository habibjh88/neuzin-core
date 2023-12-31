<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;
use devofwp\Neuzin\Helper;
use Elementor\Utils;
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
// icon , image

$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-zoomout-50 opacity-animation transition-100 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="working-process-default working-process-<?php echo esc_attr( $data['style'] );?>">
			<div class="rtin-item">
				<?php if ( !empty( $data['process_no'] ) ) { ?>
				<div class="count-number"><?php echo esc_html( $data['process_no'] );?></div>
				<?php } ?>
				<?php if ( !empty( $data['title'] ) ) { ?>
					<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>			
				<?php } ?>
				<div class="rtin-icon">			
					<?php if ( $final_icon_image_url ): ?>
						<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
					<?php else : ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>