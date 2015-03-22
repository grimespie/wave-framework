<?php

/**
 *
 * Column Shortcodes
 *
 */


// One Half
function wave_one_half($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"   => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-one-half ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("one_half", "wave_one_half");


// One Third
function wave_one_third($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-one-third ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("one_third", "wave_one_third");


// Two Thirds
function wave_two_third($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-two-third ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("two_third", "wave_two_third");


// One Fourth
function wave_one_fourth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-one-fourth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("one_fourth", "wave_one_fourth");


// Two Fourth
function wave_two_fourth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-two-fourth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("two_fourth", "wave_two_fourth");


// Three Fourth
function wave_three_fourth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-three-fourth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("three_fourth", "wave_three_fourth");


// One Fifth
function wave_one_fifth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-one-fifth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("one_fifth", "wave_one_fifth");


// Two Fifth
function wave_two_fifth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-two-fifth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("two_fifth", "wave_two_fifth");


// Three Fifth
function wave_three_fifth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-three-fifth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("three_fifth", "wave_three_fifth");


// Four Fifth
function wave_four_fifth($atts, $content="") {
    extract(shortcode_atts(array(
                                 "last"  => "false"
                                ), $atts));

    $Clear = "";
    $Class = "";

    if($last == "true") {
        $Clear = '<div class="wave-column-last"></div>';
        $Class = "wave-column-no-margin";
    }

    return('<div class="wave-column-four-fifth ' . $Class . '">' . do_shortcode($content) . '</div>' . $Clear);
}

add_shortcode("four_fifth", "wave_four_fifth");

?>