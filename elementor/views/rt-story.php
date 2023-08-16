<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Neuzin_Core;

?>
<div class="rtin-story">
	<ul class="story-layout">
		<?php foreach ( $data['story_info'] as $rtstory ) { ?>
			<li class="story-box-layout">
				<?php if ( !empty($rtstory['story_year']) ) { ?>
				<div class="rtin-year"><?php echo wp_kses_post( $rtstory['story_year'] ); ?></div>
				<?php } ?>
				<div class="rtin-content">
					<?php if ( !empty($rtstory['title']) ) { ?>
					<h3 class="rtin-title"><?php echo wp_kses_post( $rtstory['title'] ); ?></h3>
					<?php } if ( !empty($rtstory['content']) ) { ?>
					<div class="rtin-text"><?php echo wp_kses_post( $rtstory['content'] ); ?></div>
					<?php } ?>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>

