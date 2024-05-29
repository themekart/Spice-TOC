<?php
if ( ! class_exists( 'Gutenberg_Block' ) ) {

    class Gutenberg_Block {

        public static function init() {
            add_action( 'init', array( __CLASS__, 'register_block' ) );
        }

        public static function register_block() {
            if ( ! function_exists( 'register_block_type' ) ) {
                return;
            }

            wp_register_script(
                'toc-block',
                ADV_TOC_PLUGIN_URL . 'assets/js/toc-block.js',
                array( 'wp-blocks', 'wp-element', 'wp-editor' ),
                true
            );

            wp_register_style(
                'toc-block-editor',
                ADV_TOC_PLUGIN_URL . 'assets/css/toc-block-editor.css',
                array( 'wp-edit-blocks' ),
                true
            );

            wp_register_style(
                'toc-block',
                ADV_TOC_PLUGIN_URL . 'assets/css/toc-block.css',
                array(),
                true
            );

            register_block_type( 'adv-toc/block', array(
                'editor_script' => 'toc-block',
                'editor_style'  => 'toc-block-editor',
                'style'         => 'toc-block',
                'render_callback' => array( 'TOC_Render', 'render_floating_toc' ),
            ) );
        }
    }
}
