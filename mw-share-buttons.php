<?php
/**
 * Plugin Name: MW Share Buttons
 * Plugin URI: https://github.com/inc2734/mw-share-buttons
 * Description: Adds social share buttons.
 * Version: 0.1.0
 * Author: Takashi Kitajima
 * Author URI: http://2inc.org
 * Created : October 19, 2016
 * Modified:
 * Text Domain: mw-share-buttons
 * Domain Path: /languages/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

include_once( __DIR__ . '/vendor/autoload.php' );

class MW_Share_Buttons {

	public function __construct() {
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	public static function uninstall() {
		delete_option( \MwShareButtons\Setup\Config::NAME );
	}

	public function plugins_loaded() {
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'smart-custom-fields/smart-custom-fields.php' ) ) {
			return;
		}

		new \MwShareButtons\Functions\OptionPage();
		new \MwShareButtons\Setup\Assets();
		new \MwShareButtons\Setup\Ajax();
		new \MwShareButtons\Setup\Shortcode();

		$positions = SCF::get_option_meta( 'mw-share-buttons-option', 'position' );
		if ( is_array( $positions ) ) {
			foreach ( $positions as $position ) {
				$this->display_mw_share_buttons( $position );
			}
		}
	}

	public function display_mw_share_buttons( $position ) {
		add_filter( 'the_content', function( $content ) use ( $position ) {
			if ( ! is_singular() ) {
				return $content;
			}

			$post_types = SCF::get_option_meta( 'mw-share-buttons-option', 'post-type' );
			if ( ! is_array( $post_types ) || ! in_array( get_post_type(), $post_types ) ) {
				return $content;
			}

			$layout = SCF::get_option_meta( 'mw-share-buttons-option', 'layout' );
			$share_buttons = sprintf(
				'[%s type="%s"]',
				\MwShareButtons\Setup\Config::KEY,
				$layout
			);

			if ( $position === 'before_content' ) {
				return $share_buttons . $content;
			}

			if ( $position === 'after_content' ) {
				return $content . $share_buttons;
			}

			return $content;
		} );
	}
}

$MW_Share_Buttons = new MW_Share_Buttons();
