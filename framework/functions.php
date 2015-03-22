<?php

/**
 *
 * Functions
 *
 */

function wave_topbar_content($position) {
    if(get_option("wave_topbar_" . $position) == "social-icons") {
        wave_social_icons();
    }
    else if(get_option("wave_topbar_" . $position) == "contact-information") {
        wave_contact_info();
    }
    else if(get_option("wave_topbar_" . $position) == "search-form") {
        wave_search_form();
    }
    else if(get_option("wave_topbar_" . $position) == "navigation") {
        wave_topbar_nav();
    }
}

function wave_social_icon_link($icon, $url) {
    if($url != "") {
    ?>

        <a href="<?php print($url); ?>" target="_blank" class="<?php print(wave_social_icon_class("facebook")); ?>"><i class="fa fa-<?php print($icon); ?> fa-2"></i></a>

    <?php
    }
}

function wave_social_icons() {
    global $Wave;

    print('<div id="header-social-icons">');

    wave_social_icon_link("dribble", $Wave->get_dribble_url());

    wave_social_icon_link("facebook", $Wave->get_facebook_url());

    wave_social_icon_link("flickr", $Wave->get_flickr_url());

    wave_social_icon_link("foursquare", $Wave->get_foursquare_url());

    wave_social_icon_link("googleplus", $Wave->get_googleplus_url());

    wave_social_icon_link("instagram", $Wave->get_instagram_url());

    wave_social_icon_link("linkedin", $Wave->get_linkedin_url());

    wave_social_icon_link("pinterest", $Wave->get_pinterest_url());

    wave_social_icon_link("skype", $Wave->get_skype_url());

    wave_social_icon_link("tumblr", $Wave->get_tumblr_url());

    wave_social_icon_link("twitter", $Wave->get_twitter_url());

    wave_social_icon_link("vimeo", $Wave->get_vimeo_url());

    wave_social_icon_link("xing", $Wave->get_xing_url());

    wave_social_icon_link("youtube", $Wave->get_youtube_url());

    print('</div>');
}

function wave_contact_info() {
}

function wave_search_form() {
}

function wave_social_icon_class($social_network) {
    global $Wave;

    $Class = $Wave->social_icon_color($social_network);

    if($Wave->move_social_icon_on_hover()) {
        $Class .= ' social-icon-move';
    }

    return($Class);
}

function wave_header() {
    global $Wave;

    $Wave->load_header();
}

function wave_footer() {
    global $Wave;

    $Wave->load_footer();
}

function wave_header_class() {
    global $Wave;

    if($Wave->is_header_fixed()) {
        print("wave-fixed-header");
    }
}

function wave_footer_class() {
    global $Wave;

    if($Wave->is_footer_fixed()) {
        print("wave-fixed-footer");
    }
}

function wave_header_id() {
    print("header-wrapper");
}

function wave_main_id() {
    print("main-wrapper");
}

function wave_footer_id() {
    print("footer-wrapper");
}

function wave_nav() {
    $Args = array(
                  "theme_location" => "primary",
                  "container"      => "nav",
                  "container_id"   => "wave-primary-menu"
                 );

    wp_nav_menu($Args);
}

function wave_topbar_nav() {
    $Args = array(
                  "theme_location" => "top-bar",
                  "container"      => "nav",
                  "container_id"   => "wave-topbar-menu"
                 );

    wp_nav_menu($Args);
}

function wave_logo() {
    global $Wave;
    ?>

    <a href="<?php bloginfo("url"); ?>">

    <?php
    if($Wave->is_logo()) {
    ?>

        <img src="<?php print($Wave->get_logo()); ?>" id="logo" alt="<?php bloginfo("sitename"); ?>" />

    <?php
    }
    else {
    ?>

        <div id="logo"><?php bloginfo("name"); ?></div>

    <?php
    }
    ?>

    </a>

<?php
}

?>