<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

use devofwp\Lib\WP_SVG;


if( !empty( $data['price'] )){
	$price_html  = '<span class="currency">' . $data['price_symbol'] . '</span>' . $data['price']. '<span class="super-script">' . $data['price_fac'] . '</span>';
} else {
	$price_html = '';
}

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}

if ( !empty( $data['buttontext'] ) ) {
	$btn = '<a class="btn-ghost" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

?>

<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="default-pricing rtin-pricing-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['display_active'] );?> <?php echo esc_attr( $data['offer_active'] );?>">
			<?php if ( $data['offer_active'] == 'offer-active' ){ ?>
		    <div class="status-shape"><span class="status-text"><?php echo esc_html( $data['offertext'] );?></span></div>
		    <?php } ?>
		    <div class="item-price"><?php echo wp_kses_post( $price_html );?></div>
		    <?php if ( !empty( $data['title'] )) { ?>
		    <h3 class="item-title"><?php echo esc_html( $data['title'] );?></h3>
		    <?php } ?>
		    <ul class="block-list">
		    	<?php foreach ( $data['features'] as $feature ): ?>
		        <li><?php echo esc_html( $feature );?></li>
		        <?php endforeach; ?>
		    </ul>
		    <div class="rtin-price-button"><?php echo wp_kses_post( $btn );?></div>
		</div>
	</div>
</div>