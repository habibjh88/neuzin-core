<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';

?>
<div class="rtin-app-slider owl-wrap rt-owl-nav-2 <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
		<?php foreach ( $data['apps'] as $app ): ?>
			<div class="rtin-item">					
			<?php if ( !empty( $app['url'] ) ): ?>
				<a href="<?php echo esc_url( $app['url'] );?>" target="_blank"><?php echo wp_get_attachment_image( $app['image']['id'], 'full' )?></a>
			<?php else: ?>
				<?php echo wp_get_attachment_image( $app['image']['id'], 'full' )?>
			<?php endif; ?>
			</div>
		<?php endforeach; ?>                      
	</div>
</div>