<?php
/**
 * Plugin Name: Your Table of Content
 * Plugin URI: https://example.com/
 * Description: This is a custom block plugin.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com/
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: spice-toc
 *
 * @package my-block-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define plugin path and URL.

define( 'ADV_TOC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADV_TOC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include the necessary files
require_once ADV_TOC_PLUGIN_PATH . 'includes/class-toc-generator.php';
require_once ADV_TOC_PLUGIN_PATH . 'includes/class-toc-settings.php';
require_once ADV_TOC_PLUGIN_PATH . 'includes/class-toc-render.php';
require_once ADV_TOC_PLUGIN_PATH . 'includes/class-gutenberg-block.php';

/**  Initialize the plugin */
function adv_toc_plugin_init() {
    TOC_Generator::init();
    TOC_Settings::init();
    TOC_Render::init();
    Gutenberg_Block::init();
}
add_action( 'plugins_loaded', 'adv_toc_plugin_init' );

function adv_toc_enqueue_admin_assets( $hook_suffix ) {
    if ( 'settings_page_toc-settings' !== $hook_suffix ) { wp_die();
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'toc-admin-styles', ADV_TOC_PLUGIN_URL . 'assets/css/toc-admin.css' );
    wp_enqueue_script( 'toc-admin-script', ADV_TOC_PLUGIN_URL . 'assets/js/toc-script.js', array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'adv_toc_enqueue_admin_assets' );

