<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

$lg_item = ( 12 / $data['col_lg']);
$md_item = ( 12 / $data['col_md']);
$sm_item = ( 12 / $data['col_sm']);
$xs_item = ( 12 / $data['col_xs']);

$col_class = "col-lg-{$lg_item} col-md-{$md_item} col-sm-{$sm_item} col-{$xs_item}";
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="rtin-app-grid">
		<div class="row">
			<?php $i = $data['delay']; foreach ( $data['apps'] as $app ): ?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $i );?>">
						<div class="rtin-item">
						<figure>
						<?php if ( !empty( $app['url'] ) ): ?>
							<a href="<?php echo esc_url( $app['url'] );?>" target="_blank"><?php echo wp_get_attachment_image( $app['image']['id'], 'full' )?></a>
						<?php else: ?>
							<?php echo wp_get_attachment_image( $app['image']['id'], 'full' )?>
						<?php endif; ?>
						</figure>
						</div>
					</div>
				</div>
			<?php $i = $i + 300; endforeach; ?> 
		</div>
	</div>
</div>