<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

?>
<div class="rt-el-cta cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="container">
		<div class="align-items row">
			<div class="cta-content col-lg-8">
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
			</div>
			<div class="phone-number col-lg-4">
				<span><i class="flaticon-telephone"></i></span><h3><a href="tel:<?php echo esc_attr( $data['pho_number'] ); ?>"><?php echo esc_html( $data['pho_number'] ); ?></a></h3>
			</div>
		</div>		
	</div>
</div>