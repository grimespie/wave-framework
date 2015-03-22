<?php

/**
 *
 * Enqueue Javascript and CSS
 *
 */

class wave_EnqueueScripts {

    static function registerScripts() {
        global $Wave;

        wp_register_script("imagesloaded-js", get_template_directory_uri() . "/framework/js/imagesloaded.js", array("jquery"), "3.0.4");
        wp_register_script("wave-js", get_template_directory_uri() . "/framework/js/wave.js", array("jquery"), "1.0");
        wp_register_script("theme-js", get_template_directory_uri() . "/js/theme.js", array("jquery"));

        $WaveStyles = "foundations";

        if($Wave->is_responsive()) {
            $WaveStyles .= ",responsive";

            wp_register_style("theme-responsive", get_template_directory_uri() . "/css/responsive.css");
        }

        $WaveStyles .= ",headers,footers,shortcodes,woocommerce";

        wp_register_style("wave-theme-css", get_template_directory_uri() . "/framework/load_styles.php?c=1&dir=ltr&base=" . get_template_directory() . "/framework/css/&load=" . $WaveStyles);
    }

    static function enqueueScripts() {
        global $Wave;

        wp_enqueue_script("jquery");
        wp_enqueue_script("imagesloaded-js");
        wp_enqueue_script("wave-js");
        wp_enqueue_script("theme-js");

        if($Wave->is_responsive()) {
            wp_enqueue_style("theme-responsive");
        }

        wp_enqueue_style("wave-theme-css");
    }

    static function registerAdminScripts() {
        wp_register_style("font-awesome", "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
        wp_register_style("wave-admin-css", get_template_directory_uri() . "/framework/load_styles.php?c=1&dir=ltr&base=" . get_template_directory() . "/framework/css/&load=foundations,wave-admin");

        wp_register_script("highcharts", get_template_directory_uri() . "/framework/js/highcharts.js", array(), "3.0.10");
        wp_register_script("wave-admin-js", get_template_directory_uri() . "/framework/js/wave-admin.js", array("jquery", "jquery-ui-draggable", "highcharts", "wp-color-picker"), "1.0");
    }

    static function enqueueAdminScripts() {
        wp_enqueue_media();

        wp_enqueue_style("font-awesome");
        wp_enqueue_style("wave-admin-css");
        wp_enqueue_style("wp-color-picker");

        wp_enqueue_script("highcharts");
        wp_enqueue_script("wave-admin-js");
        wp_enqueue_script("wp-color-picker");
    }

}

add_action("wp_enqueue_scripts", array("wave_EnqueueScripts", "registerScripts"), 1);
add_action("wp_enqueue_scripts", array("wave_EnqueueScripts", "enqueueScripts"), 2);

add_action("admin_enqueue_scripts", array("wave_EnqueueScripts", "registerAdminScripts"), 1);
add_action("admin_enqueue_scripts", array("wave_EnqueueScripts", "enqueueAdminScripts"), 2);

?>