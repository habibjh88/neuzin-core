<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

use Elementor\Icons_Manager;

?>
<div class="rtin-tab">
	<div class="row feature-tab-layout">
		<ul class="col-lg-3 nav nav-tabs tab-nav-list">
		<?php $i = 1;
	    foreach ( $data['tab_items'] as $tab_item_list ) { ?>
			<li class="nav-item"><a class="<?php echo wp_kses_post( $tab_item_list['themestyle'] ); ?> <?php if ( $i == 1 ) { ?>active<?php } ?>" href="#nav-<?php echo esc_html( $i ); ?>" data-bs-toggle="tab" aria-bs-expanded="false"><?php if( !empty($tab_item_list['icon_class']) ) { ?><?php Icons_Manager::render_icon( $tab_item_list['icon_class'], [ 'aria-hidden' => 'true' ] ); ?><?php } ?>
				<span><?php echo wp_kses_post( $tab_item_list['title'] ); ?></span></a>
			</li>
			<?php $i++; } ?>
		</ul>
		<div class="col-lg-9 tab-content">
			<?php $i = 1;		
			foreach ( $data['tab_items'] as $tab_item_list ) { ?>
			<div class="tab-pane fade <?php if ( $i == 1 ) { ?>active<?php } ?> show" id="nav-<?php echo esc_html( $i ); ?>">
				<div class="rtin-text"><?php echo wp_kses_post( $tab_item_list['content'] ); ?></div>
			</div>
			<?php $i++; } ?>
		</div>
	</div>
</div>

