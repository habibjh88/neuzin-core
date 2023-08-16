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

<!-- MultiScroll Area End Here -->

<div id="pagepiling" class="pagepiling-wrapper">
	<?php		
		foreach ( $data['pagepiling_lists'] as $pagepiling_list ) { 
		$pagepiling_list = $pagepiling_list['content_tab'];
		?>
		<div class="section">
			<div class="scroll-wrap">
				<?php echo $content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $pagepiling_list ) ; ?>
			</div>
		</div>		
	<?php } ?>
</div>