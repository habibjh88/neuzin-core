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

// icon , image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}
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
	 <div class="translate-bottom-100 opacity-animation transition-100 transition-delay-<?php echo esc_attr( $data['delay'] );?>">
	    <div class="info-box-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['left_icon'] );?>">
	        <div class="item-icon">
	            <div class="icon-color">
	                <?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
						<?php echo wp_kses_post($getimg);?>  
					<?php }else{?> 	
					<?php if ( $final_icon_image_url ): ?>
						<span class="svg-img"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
					<?php else: ?>
						<i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i>
					<?php endif ?>
					<?php }  ?>
	            </div>
	        </div> 
	        <div class="rtin-content">
	        	<?php if ( !empty( $data['title'] ) ) { ?><h3 class="item-title"><?php echo wp_kses_post( $title );?></h3><?php } ?>
	        	<?php if ( !empty( $data['content'] ) ) { ?><?php echo wp_kses_post( $data['content'] ); ?><?php } ?>
	        </div>
	    </div>
	</div>
</div>