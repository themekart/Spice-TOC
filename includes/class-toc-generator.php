<?php
if ( ! class_exists( 'TOC_Generator' ) ) {

    class TOC_Generator {

        public static function init() {
            add_filter( 'the_content', array( __CLASS__, 'generate_toc' ) );
        }

        public static function generate_toc( $content ) {
            if ( is_single() || is_page() ) {
                $toc = '<div id="toc-container">' . self::extract_headings( $content ) . '</div>';
                $content = $toc . $content;
            }
            return $content;
        }

        public static function extract_headings( $content ) {
            $matches = array();
            preg_match_all( '/<h([1-6])>(.*?)<\/h[1-6]>/', $content, $matches, PREG_SET_ORDER );

            if ( empty( $matches ) ) {
                return '';
            }

            $toc = '<ul>';
            foreach ( $matches as $heading ) {
                $level = $heading[1];
                $title = strip_tags( $heading[2] );
                $id = sanitize_title( $title );
                $toc .= sprintf( '<li class="toc-level-%1$d"><a href="#%2$s">%3$s</a></li>', $level, $id, $title );
            }
            $toc .= '</ul>';

            return $toc;
        }
    }
}
