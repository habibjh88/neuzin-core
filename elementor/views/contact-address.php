<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

?>

<div class="<?php if ( $data['animation_display'] == 'yes' ) { ?>has-animation<?php } else { ?>no-animation<?php } ?>">
	<div class="rtin-address-default <?php echo esc_attr( $data['style'] ); ?>">
		<div class="rtin-address-info">
			<?php if ( !empty( $data['address_title'] ) ) { ?>
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['address_title'] );?></h2>
			<?php } ?>
			<?php if ( !empty( $data['address_info'] )  ) { ?>
				<div class="rtin-address">
					<?php $i = $data['delay']; foreach ( $data['address_info'] as $address ) { ?>
						<div class="rtin-item translate-left-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $i );?>">
							<?php if ( !empty($address['address_label']) || !empty( $address['address_infos']) ) { ?>
								<div class="rtin-icon"><?php echo wp_kses_post( $address['address_icon'] ); ?></div>
								<div class="rtin-info"><h3><?php echo esc_html( $address['address_label'] ); ?></h3><?php echo wp_kses_post( $address['address_infos'] ); ?></div>
							<?php } ?>
						</div>
					<?php $i = $i + 500; } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>