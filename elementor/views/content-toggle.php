<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

extract($data);
$content_1_id = "content_1_id_" . uniqid();
$content_2_id = "content_2_id_" . uniqid();
$content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_1_content ) ;
$content_2 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_2_content ) ;
?>
<div class="rtel-content-toggle">
	<ul class="nav nav-tabs" data-id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#<?php echo esc_attr( $content_1_id ); ?>" role="tab" aria-controls="home-tab" aria-selected="true"><?php echo esc_html( $section_1_heading ); ?></a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#<?php echo esc_attr( $content_2_id ); ?>" role="tab" aria-controls="profile-tab" aria-selected="false"><?php echo esc_html( $section_2_heading ); ?></a>
	  </li>
	</ul>
	<div class="tab-content" data-id="myTabContent">
	  <div class="tab-pane active" id="<?php echo esc_attr( $content_1_id ); ?>" role="tabpanel" aria-labelledby="home-tab">
	  	<?php print( $content_1 ); ?>
	  </div>
	  <div class="tab-pane" id="<?php echo esc_attr( $content_2_id ); ?>" role="tabpanel" aria-labelledby="profile-tab">
	  	<?php print( $content_2 ); ?>
	  </div>
	</div>
</div> 