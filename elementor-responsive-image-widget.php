<?php
/**
 * Plugin Name: Elementor Responsive Image Widget By HamidReza Yazdani
 * Description: A lightweight Elementor widget to add responsive images with captions, titles, alt text, and advanced styling options.
 * Plugin URI: https://example.com/
 * Version: 1.0.0
 * Author: HamidReza Yazdani
 * Author URI: https://github.com/hamidrezayazdani
 * Text Domain: elementor-responsive-image-widget
 * Domain Path: /languages
 * Requires at least: 5.6
 * Requires PHP: 7.0
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'ERIW_VERSION', '1.0.0' );
define( 'ERIW_PLUGIN_FILE', __FILE__ );
define( 'ERIW_PLUGIN_PATH', plugin_dir_path( ERIW_PLUGIN_FILE ) );
define( 'ERIW_PLUGIN_URL', plugin_dir_url( ERIW_PLUGIN_FILE ) );

// Check if Elementor is installed and activated.
if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'eriw_elementor_missing_notice' );

	return;
}

if ( ! function_exists( 'eriw_elementor_missing_notice' ) ) {

	/**
	 * Display admin notice if Elementor is not installed or activated.
	 */
	function eriw_elementor_missing_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$elementor_install_url = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => 'elementor',
				),
				admin_url( 'update.php' )
			),
			'install-plugin_elementor',
		);

		$message = sprintf(
		/* translators: 1: Plugin name, 2: Elementor, 3: Elementor installation link */
			esc_html__( '%1$s requires %2$s to be installed and activated. %3$s', 'elementor-responsive-image-widget' ),
			'<strong>' . esc_html__( 'Elementor Responsive Image Widget', 'elementor-responsive-image-widget' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-responsive-image-widget' ) . '</strong>',
			'<a href="' . esc_url( $elementor_install_url ) . '">' . esc_html__( 'Install Elementor Now', 'elementor-responsive-image-widget' ) . '</a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message );
	}
}

if ( ! function_exists( 'eriw_register_responsive_image_widget' ) ) {

	/**
	 * Register the responsive image widget.
	 */
	function eriw_register_responsive_image_widget( $widgets_manager ) {
		require_once ERIW_PLUGIN_PATH . 'includes/class-responsive-image-widget.php';

		$widgets_manager->register( new ERIW_Responsive_Image_Widget() );
	}

	add_action( 'elementor/widgets/register', 'eriw_register_responsive_image_widget' );
}

if ( ! function_exists( 'eriw_load_textdomain' ) ) {

	/**
	 * Load plugin textdomain.
	 */
	function eriw_load_textdomain() {
		load_plugin_textdomain(
			'elementor-responsive-image-widget',
			false,
			dirname( plugin_basename( ERIW_PLUGIN_FILE ) ) . '/languages'
		);
	}

	add_action( 'plugins_loaded', 'eriw_load_textdomain' );
}

if ( ! function_exists( 'eriw_add_rtl_support' ) ) {

	/**
	 * Add RTL support.
	 */
	function eriw_add_rtl_support() {
		if ( is_rtl() ) {
			wp_enqueue_style(
				'eriw-rtl',
				ERIW_PLUGIN_URL . 'assets/css/rtl.css',
				array(),
				ERIW_VERSION
			);
		}
	}

	add_action( 'wp_enqueue_scripts', 'eriw_add_rtl_support' );
}