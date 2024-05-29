<?php
if ( ! class_exists( 'TOC_Settings' ) ) {

    class TOC_Settings {

        public static function init() {
            add_action( 'admin_menu', array( __CLASS__, 'add_settings_page' ) );
            add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
        }

        public static function add_settings_page() {
            add_options_page(
                'TOC Settings',
                'TOC Settings',
                'manage_options',
                'toc-settings',
                array( __CLASS__, 'settings_page_html' )
            );
        }

        public static function register_settings() {
            register_setting( 'toc_settings', 'toc_position' );
            register_setting( 'toc_settings', 'toc_appearance' );
            register_setting( 'toc_settings', 'toc_background_color' );
            register_setting( 'toc_settings', 'toc_text_color' );
            register_setting( 'toc_settings', 'toc_width' );
        }

        public static function settings_page_html() {
            ?>
            <div class="wrap toc-settings-page">
                <h1><?php esc_html_e( 'TOC Settings', 'advanced-toc' ); ?></h1>
                <form method="post" action="options.php">
                    <?php
                    settings_fields( 'toc_settings' );
                    do_settings_sections( 'toc_settings' );
                    ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="toc_position"><?php esc_html_e( 'TOC Position', 'advanced-toc' ); ?></label>
                            </th>
                            <td>
                                <select name="toc_position" id="toc_position">
                                    <option value="top" <?php selected( get_option('toc_position'), 'top' ); ?>><?php esc_html_e( 'Top of Content', 'advanced-toc' ); ?></option>
                                    <option value="bottom" <?php selected( get_option('toc_position'), 'bottom' ); ?>><?php esc_html_e( 'Bottom of Content', 'advanced-toc' ); ?></option>
                                    <option value="after_first_heading" <?php selected( get_option('toc_position'), 'after_first_heading' ); ?>><?php esc_html_e( 'After First Heading', 'advanced-toc' ); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="toc_appearance"><?php esc_html_e( 'Appearance', 'advanced-toc' ); ?></label>
                            </th>
                            <td>
                                <select name="toc_appearance" id="toc_appearance">
                                    <option value="minimalist" <?php selected( get_option('toc_appearance'), 'minimalist' ); ?>><?php esc_html_e( 'Minimalist', 'advanced-toc' ); ?></option>
                                    <option value="boxed" <?php selected( get_option('toc_appearance'), 'boxed' ); ?>><?php esc_html_e( 'Boxed', 'advanced-toc' ); ?></option>
                                    <option value="underlined" <?php selected( get_option('toc_appearance'), 'underlined' ); ?>><?php esc_html_e( 'Underlined', 'advanced-toc' ); ?></option>
                                    <option value="bulleted_list" <?php selected( get_option('toc_appearance'), 'bulleted_list' ); ?>><?php esc_html_e( 'Bulleted List', 'advanced-toc' ); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="toc_background_color"><?php esc_html_e( 'Background Color', 'advanced-toc' ); ?></label>
                            </th>
                            <td>
                                <input type="text" name="toc_background_color" id="toc_background_color" value="<?php echo esc_attr( get_option('toc_background_color', '#ffffff') ); ?>" class="my-color-field" data-default-color="#ffffff" />
                                <p class="description"><?php esc_html_e( 'Enter a hex color code, e.g., #ffffff for white.', 'advanced-toc' ); ?></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="toc_text_color"><?php esc_html_e( 'Text Color', 'advanced-toc' ); ?></label>
                            </th>
                            <td>
                                <input type="text" name="toc_text_color" id="toc_text_color" value="<?php echo esc_attr( get_option('toc_text_color', '#000000') ); ?>" class="my-color-field" data-default-color="#000000" />
                                <p class="description"><?php esc_html_e( 'Enter a hex color code, e.g., #000000 for black.', 'advanced-toc' ); ?></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="toc_width"><?php esc_html_e( 'Width', 'advanced-toc' ); ?></label>
                            </th>
                            <td>
                                <select name="toc_width" id="toc_width">
                                    <option value="200px" <?php selected( get_option('toc_width'), '200px' ); ?>><?php esc_html_e( '200px', 'advanced-toc' ); ?></option>
                                    <option value="250px" <?php selected( get_option('toc_width'), '250px' ); ?>><?php esc_html_e( '250px', 'advanced-toc' ); ?></option>
                                    <option value="300px" <?php selected( get_option('toc_width'), '300px' ); ?>><?php esc_html_e( '300px', 'advanced-toc' ); ?></option>
                                    <option value="100%" <?php selected( get_option('toc_width'), '100%' ); ?>><?php esc_html_e( '100%', 'advanced-toc' ); ?></option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
            <?php
        }
    }
}
