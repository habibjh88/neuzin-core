<?php
/*
Plugin Name: Neuzin Core
Plugin URI: https://www.radiustheme.com
Description: Neuzin Core Plugin for Neuzin Theme
Version: 2.0.0
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'NEUZIN_VERSION' ) ) {
	return;
}

if ( ! defined( 'NEUZIN_CORE' ) ) {
	define( 'NEUZIN_CORE', ( WP_DEBUG ) ? time() : '1.0' );
	define( 'NEUZIN_CORE_THEME_PREFIX', 'neuzin' );
	define( 'NEUZIN_CORE_THEME_PREFIX_VAR', 'neuzin' );
	define( 'NEUZIN_CORE_CPT_PREFIX', 'neuzin' );
	define( 'NEUZIN_CORE_BASE_DIR', plugin_dir_path( __FILE__ ) );
}

class Neuzin_Core {

	public $plugin = 'neuzin-core';
	public $action = 'neuzin_theme_init';

	public function __construct() {
		$prefix = NEUZIN_CORE_THEME_PREFIX_VAR;

		add_action( 'plugins_loaded', [ $this, 'demo_importer' ], 15 );
		add_action( 'plugins_loaded', [ $this, 'load_textdomain' ], 16 );
		add_action( 'after_setup_theme', [ $this, 'post_meta' ], 15 );
		add_action( 'after_setup_theme', [ $this, 'elementor_widgets' ] );
		add_action( $this->action, [ $this, 'after_theme_loaded' ] );

		// Redux Flash permalink after options changed
		add_action( "redux/options/{$prefix}/saved", [ $this, 'flush_redux_saved' ], 10, 2 );
		add_action( "redux/options/{$prefix}/section/reset", [ $this, 'flush_redux_reset' ] );
		add_action( "redux/options/{$prefix}/reset", [ $this, 'flush_redux_reset' ] );
		add_action( 'init', [ $this, 'rewrite_flush_check' ] );
		add_action( 'redux/loaded', [ $this, 'neuzin_remove_demo' ] );

		require_once 'module/rt-post-share.php';
		require_once 'module/rt-post-views.php';
		require_once 'module/rt-post-length.php';

		// Widgets
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/rt-recent-post-widget.php';
		require_once 'widget/rt-post-box.php';
		require_once 'widget/rt-post-tab.php';
		require_once 'widget/rt-feature-post.php';
		require_once 'widget/rt-open-hour-widget.php';
		require_once 'widget/search-widget.php'; // override default
		require_once 'widget/rt-product-box.php';

		require_once 'widget/widget-settings.php';
		require_once 'widget/rt-widget-fields.php';

	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	 */

	public function neuzin_remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', [
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
			], null, 2 );

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', [ ReduxFrameworkPlugin::instance(), 'admin_notices' ] );
		}
	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}

	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	public function post_meta() {
		if ( ! did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}

	public function elementor_widgets() {
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {

			require_once 'elementor/init.php';
		}
	}

	public function after_theme_loaded() {
		require_once NEUZIN_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url() {

		$file = dirname( dirname( __FILE__ ) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file        = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;
	}

	// Flush rewrites
	public function flush_redux_saved( $saved_options, $changed_options ) {
		if ( empty( $changed_options ) ) {
			return;
		}
		$prefix = NEUZIN_CORE_THEME_PREFIX_VAR;
		$flush  = false;

		if ( $flush ) {
			update_option( "{$prefix}_rewrite_flash", true );
		}
	}

	public function flush_redux_reset() {
		$prefix = NEUZIN_CORE_THEME_PREFIX_VAR;
		update_option( "{$prefix}_rewrite_flash", true );
	}

	public function rewrite_flush_check() {
		$prefix = NEUZIN_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}

}

new Neuzin_Core;

// Remove Redux News Flash
if ( ! class_exists( 'reduxNewsflash' ) ) {
	class reduxNewsflash {
		public function __construct( $parent, $params ) {
		}
	}
}

// Optimizer
require_once 'optimizer/__init__.php';

