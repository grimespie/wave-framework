<?php

function wave_contact_form($atts, $content="") {
    extract(shortcode_atts(array(
                                 "id"   => ""
                                ), $atts));

    $ContactForm = new ContactForm($id);

    return($ContactForm->generateForm());
}

add_shortcode("contact-form", "wave_contact_form");

?>