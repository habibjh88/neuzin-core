<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;
?>


<div class="location-map">
	<?php if ( !empty( $data['location_img']['id'] ) ) { ?>
    <div class="map-image">
    	<?php echo wp_get_attachment_image( $data['location_img']['id'], 'full' ); ?>
    </div>
	<?php } ?>
	<?php 
  	foreach ($data['location_items']  as $item ) { ?>
    <div class="locations-wrapper elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
        <div class="location-content">
            <?php echo wp_kses_post( $item['location'] ); ?>
        </div>
        <div class="location-point">
            <div class="blinking-1"></div>
            <div class="blinking-2"></div>
        </div>
    </div>
    <?php } ?>
</div>