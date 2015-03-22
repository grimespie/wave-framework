<?php

/**
 *
 * Box Shortcodes
 *
 */

function wave_notification_box($atts, $content="") {
    extract(shortcode_atts(array(
                                 "size"   => "medium",
                                 "color"  => "blue",
                                 "icon"   => "",
                                 "border" => "none"
                                ), $atts));

    $FontAwesome = "";

    if($icon != "") {
        $FontAwesome = '<i class="fa fa-' . $icon . '"></i> ';
    }

    return('<div class="wave-notification wave-notification-border-' . $border . ' wave-notification-size-' . $size . ' wave-notification-color-' . $color . '">' . $FontAwesome . $content. '</div>');
}

add_shortcode("notification", "wave_notification_box");




function wave_text_box($atts, $content="") {
    extract(shortcode_atts(array(
                                 "color"  => "blue",
                                 "icon"   => "",
                                 "border" => "none",
                                 "title"  => "",
                                 "align"  => "center"
                                ), $atts));

    $TextTitle = "";
    $FontAwesome = "";

    if($icon != "") {
        $FontAwesome = '<i class="fa fa-' . $icon . '"></i> ';
    }

    if($title != "") {
        $TextTitle = '<h3>' . $FontAwesome . $title . '</h3>';
    }

    return('<div class="wave-content-box wave-content-align-' . $align . ' wave-content-box-border-' . $border . ' wave-content-box-color-' . $color . '">' . $TextTitle . $content . '</div>');
}

add_shortcode("contentbox", "wave_text_box");

?>