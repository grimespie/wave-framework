<?php

/**
 *
 * Button Shortcodes
 *
 */

function wave_button_shortcode($atts) {
    extract(shortcode_atts(array(
                                 "link"  => "",
                                 "size"  => "medium",
                                 "color" => "blue",
                                 "text"  => "",
                                 "icon"  => "",
                                ), $atts));

    return('<a href="' . $link . '" class="wave-button wave-button-size-' . $size . ' wave-button-color-' . $color . '">' . $text . '</a>');
}

add_shortcode("button", "wave_button_shortcode");

?>