<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use NeuzinTheme;
use NeuzinTheme_Helper;
use \WP_Query;


?>
<div class="rt-image">
	<div class="figure-holder">
		<div class="mask-text">
			<h3 class="rtin-year"><?php echo wp_kses_post( $data['year'] ); ?></h3>
			<?php if( !empty ( $data['content'] ) ) { ?>
			<p class="sub-text"><?php echo wp_kses_post( $data['content'] ); ?></p>
			<?php } ?>
		</div>
		<div class="left-holder">
			<?php if ( !empty( $data['image_one']['id'] ) ) { 
				echo wp_get_attachment_image( $data['image_one']['id'], 'full' ); 
			 } else { 
				echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
			} ?>
		</div>
		<div class="right-holder">
			<?php if ( !empty( $data['image_two']['id'] ) ) { 
				echo wp_get_attachment_image( $data['image_two']['id'], 'full' ); 
			 } else { 
				echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
			} ?>
			<?php if ( !empty( $data['image_three']['id'] ) ) { 
				echo wp_get_attachment_image( $data['image_three']['id'], 'full' ); 
			 } else { 
				echo '<img class="wp-post-image" src="' . NeuzinTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
			} ?>	
		</div>
	</div>
</div>