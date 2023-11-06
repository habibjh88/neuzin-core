<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

use Elementor\Utils;
extract($data);

if( !empty( $data['price'] )){
	$price_html  = '<span class="price-symbol">' . $data['price_symbol'] . '</span>' . $data['price'] . '<span class="price-unit"> '. $data['unit'] . '</span>';
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
	$btn = '<a class="btn-fill" ' . $attr . '>' . $data['buttontext'] . '</a>';
}

// icon , image
$final_icon_class       = " flaticon-origami";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}
?>
<div class="<?php echo esc_attr( $data['animation_display'] ); ?>">
	<div class="translate-bottom-75 opacity-animation transition-150 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
		<div class="default-pricing rtin-pricing-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['display_active'] );?> <?php echo esc_attr( $data['offer_active'] );?>">		
			<div class="rt-price-table-box">
				<div class="rtin-icon">			
					<?php if ( $final_icon_image_url ): ?>
						<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
					<?php else : ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php endif ?>
				</div>
				<div class="price-header">
					<?php if ( !empty( $data['title'] )) { ?>
					<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
					<?php } ?>
				</div>
				<ul>
				<?php foreach ( $data['features'] as $feature ): ?>
					<li><?php echo esc_html( $feature );?></li>
				<?php endforeach; ?>
				</ul>
				<div class="rtin-pricing-price">
					<span class="rtin-price"><?php echo wp_kses_post( $price_html );?></span>
				</div>		
				<?php if ( !empty( $btn ) ){ ?>
					<div class="rtin-price-button"><?php echo wp_kses_post( $btn );?></div>		
				<?php } ?>
			</div>			
		</div>
	</div>
</div>