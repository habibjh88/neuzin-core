<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

?>

<div class="default-animate animate-shape-<?php echo esc_attr( $data['style'] );?>">
	<div class="has-animation">
		<div class="animated-shape">
			<div class="translate-right-75 opacity-animation transition-200 transition-delay-1000">
				<svg width="970px" height="760px">
					<defs>
					<linearGradient id="bg-gradient" x1="0%" x2="50%" y1="86.603%" y2="0%">
					<stop offset="0%" stop-color="rgb(247,250,255)" stop-opacity="1" />
					<stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
					</linearGradient>
					</defs>
					<path fill="url(#bg-gradient)"
					d="M715.405,478.430 C691.289,541.146 823.736,652.364 721.693,735.830 C626.810,813.438 547.592,682.727 427.827,642.922 C367.089,622.734 295.500,666.020 217.352,640.095 C-2.161,567.274 -60.308,320.428 65.294,175.176 C207.109,11.176 414.712,18.885 508.658,82.588 C615.101,154.765 680.034,39.621 727.466,13.599 C843.477,-50.047 1014.036,123.513 959.517,253.371 C897.826,400.314 766.709,345.013 715.405,478.430 Z"/>
				</svg>
			</div>
		</div>
	</div>
</div>