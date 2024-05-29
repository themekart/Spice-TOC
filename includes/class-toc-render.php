<?php
if ( ! class_exists( 'TOC_Render' ) ) {

    class TOC_Render {

        public static function init() {
            add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
            add_action( 'wp_footer', array( __CLASS__, 'render_floating_toc' ) );
        }

        public static function enqueue_scripts() {
            wp_enqueue_style( 'toc-style', ADV_TOC_PLUGIN_URL . 'assets/css/toc-style.css' );
            wp_enqueue_script( 'toc-script', ADV_TOC_PLUGIN_URL . 'assets/js/toc-script.js', array('jquery'), false, true );
        }

        public static function render_floating_toc() {
            if ( is_single() || is_page() ) {
                echo '<div id="floating-toc">' . TOC_Generator::extract_headings( get_the_content() ) . '</div>';
            }
        }
    }
}
