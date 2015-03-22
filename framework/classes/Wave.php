<?php

/**
 *
 * Wave Master Class
 *
 */

class Wave {

    public function __construct() {
        $this->init();
    }

    public function init() {
        $this->add_hooks();
    }

    public function add_hooks() {
        add_action("wp_head", array($this, "web_fonts"));
        add_action("wp_head", array($this, "general_icons"));
        add_action("wp_head", array($this, "option_styles"));
        add_filter("body_class", array($this, "body_class"));

        if($this->is_responsive()) {
            add_action("wp_head", array($this, "responsive_viewport"));
        }
    }

    public function general_icons() {
        if(get_option("wave_favicon") != "") {
        ?>

        <link rel="icon" href="<?php print(get_option("wave_favicon")); ?>">

        <?php
        }

        if(get_option("wave_iphone_icon") != "") {
        ?>

        <link rel="apple-touch-icon" sizes="72x72" href="<?php print(get_option("wave_iphone_icon")); ?>">

        <?php
        }

        if(get_option("wave_ipad_icon") != "") {
        ?>

        <link rel="apple-touch-icon" sizes="114x114" href="<?php print(get_option("wave_ipad_icon")); ?>">

        <?php
        }
    }

    public function body_class($body_class) {
        global $Wave;

        if(!$Wave->is_responsive()) {
            array_push($body_class, "not-responsive");
        }

        return($body_class);
    }

    public function display_style($object, $name, $option) {
        if($option != "") {
        ?>

            <?php print($object); ?> {
                <?php print($name); ?>: <?php print($option); ?>;
            }
        <?php
        }
    }

    public function option_styles() {
        print('    <style>');

        $this->display_style("a", "color", get_option("wave_link_color"));
        $this->display_style("a:hover", "color", get_option("wave_linkhover_color"));
        $this->display_style("#header-top-bar", "background-color", get_option("wave_topbar_bg_color"));
        $this->display_style("#header-top-bar", "border-color", get_option("wave_topbar_border_color"));
        $this->display_style("#header-wrapper", "background-color", get_option("wave_header_bg_color"));
        $this->display_style("#header-wrapper", "border-color", get_option("wave_header_border_color"));
        $this->display_style("#title-bar", "background-color", get_option("wave_titlebar_bg_color"));
        $this->display_style("#title-bar", "border-color", get_option("wave_titlebar_border_color"));
        $this->display_style("#footer-widget-wrapper", "background-color", get_option("wave_footer_bg_color"));
        $this->display_style("#footer-widget-wrapper", "border-color", get_option("wave_footer_border_color"));
        $this->display_style("#footer-copyright-wrapper", "background-color", get_option("wave_copyright_bg_color"));
        $this->display_style("#footer-copyright-wrapper", "border-color", get_option("wave_copyright_border_color"));
        $this->display_style("#footer-copyright-wrapper", "color", get_option("wave_copyright_text_color"));
        $this->display_style("#footer-copyright-wrapper a", "color", get_option("wave_copyright_link_color"));
        $this->display_style("#footer-copyright-wrapper a:hover", "color", get_option("wave_copyright_linkhover_color"));
        $this->display_style("#logo", "margin-top", get_option("wave_logo_top_margin"));
        $this->display_style("#logo", "margin-bottom", get_option("wave_logo_bottom_margin"));

        if(get_option("wave_layout") == "boxed") {
        ?>

        @media only screen and (min-width: 1024px) {

            <?php
            $this->display_style("#page-wrapper", "margin", "0 auto");
            $this->display_style("#page-wrapper", "width", "1024px");
            ?>

        }

        <?php
        }

        print('</style>');
    }

    public function is_responsive() {
        if(get_option("wave_responsive") == "enabled") {
            return(true);
        }

        return(false);
    }

    public function responsive_viewport() {
    ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    }

    public function web_fonts() {
    ?>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">

    <?php
    }

    public function display_topbar() {
        if(get_option("wave_topbar") == "enabled") {
            return(true);
        }

        return(false);
    }

    public function display_topbar_social_icons() {
        if(get_option("wave_topbar_socialicons") == "enabled") {
            return(true);
        }

        return(false);
    }

    public function display_footer_social_icons() {
        if(get_option("wave_footer_socialicons") == "enabled") {
            return(true);
        }

        return(false);
    }

    public function social_icon_color($social_network) {
        return($social_network . "-none");
    }

    public function move_social_icon_on_hover() {
        return(false);
    }

    public function get_dribble_url() {
        return(get_option("wave_dribble_link"));
    }

    public function get_facebook_url() {
        return(get_option("wave_facebook_link"));
    }

    public function get_flickr_url() {
        return(get_option("wave_flickr_link"));
    }

    public function get_foursquare_url() {
        return(get_option("wave_foursquare_link"));
    }

    public function get_googleplus_url() {
        return(get_option("wave_googleplus_link"));
    }

    public function get_instagram_url() {
        return(get_option("wave_instagram_link"));
    }

    public function get_linkedin_url() {
        return(get_option("wave_linkedin_link"));
    }

    public function get_pinterest_url() {
        return(get_option("wave_pinterest_link"));
    }

    public function get_skype_url() {
        return(get_option("wave_skype_link"));
    }

    public function get_tumblr_url() {
        return(get_option("wave_tumblr_link"));
    }

    public function get_twitter_url() {
        return(get_option("wave_twitter_link"));
    }

    public function get_vimeo_url() {
        return(get_option("wave_vimeo_link"));
    }

    public function get_xing_url() {
        return(get_option("wave_xing_link"));
    }

    public function get_youtube_url() {
        return(get_option("wave_youtube_link"));
    }

    public function display_topbar_menu() {
        return(false);
    }

    public function load_header() {
        $this->js_params();

        $Header = 1;

        if(get_option("wave_header_layout") != "") {
            $Header = get_option("wave_header_layout");
        }

        get_template_part("templates/headers/header", $Header);
    }

    public function load_footer() {
        $this->back_to_top();

        $Footer = 1;

        if(get_option("wave_footer_columncount") != "") {
            $Footer = get_option("wave_footer_columncount");
        }

        get_template_part("templates/footers/footer", $Footer);
    }

    public function is_parallax() {
        return(false);
    }

    public function is_not_parallax_for_mobile() {
        return(true);
    }

    public function is_logo() {
        if(get_option("wave_logo") != "") {
            return(true);
        }

        return(false);
    }

    public function get_logo() {
        return(get_option("wave_logo"));
    }

    public function is_header_fixed() {
        if(get_option("wave_sticky_header") == "enabled") {
            return(true);
        }

        return(false);
    }

    public function is_footer_fixed() {
        return(false);        
    }

    public function is_header_animated() {
        if(!$this->is_header_fixed()) {
            return(false);
        }

        return(true);
    }

    public function hide_topbar_on_animation() {
        return(true);
    }

    public function js_params() {
        $Params = array();

        if($this->is_header_fixed()) {
            $Params["fixed-header"] = true;
        }

        if($this->is_footer_fixed()) {
            $Params["fixed-footer"] = true;
        }

        if($this->is_header_animated()) {
            $Params["animated-header"] = true;
        }

        if($this->hide_topbar_on_animation()) {
            $Params["hide-topbar"] = true;
        }

        if($this->is_not_parallax_for_mobile()) {
            $Params["mobile-not-parallax"] = true;
        }

        $Keys = array_keys($Params);

        print('<div id="wave-js-params" ');

        foreach($Keys as $Key) {
            print('data-' . $Key . '="' . $Params[$Key] . '" ');
        }

        print('></div>');
    }

    public function back_to_top() {
        print('<div id="back-to-top" class="fa fa-chevron-up"></div>');
    }

}

?>