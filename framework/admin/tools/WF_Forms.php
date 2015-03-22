<?php

class WF_Forms {

    static function register_post_type() {
        $Args = array(
                      'labels' => array(
                                        'name' => 'Forms',
                                        'singular_name' => 'Form',
                                       ),
                      'public' => true,
                      'show_ui' => true,
                      'show_in_menu' => 'themes.php',
                      'supports' => array( 'title' ,'thumbnail' ),
                     );

        register_post_type("wave-form", $Args);
    }

    static function meta_box() {
        add_meta_box("wave-forms-shortcode-box", "Shortcode", array("WF_Forms", "shortcode_content"), "wave-form", "normal", "high");
        add_meta_box("wave-forms-meta-box", "Contact Form Fields", array("WF_Forms", "meta_box_content"), "wave-form", "normal", "core");
    }

    static function shortcode_content($post) {
        print('[contact-form id="' . $post->ID . '"]');
    }

    static function meta_box_content($post) {
        wp_nonce_field("wave_form_update_settings", "wave_form_settings_nonce");

        $WF_AdminOptions = new WF_AdminOptions();

        $WF_AdminOptions->tableStart();

        $WF_AdminOptions->enableDisable("First Name", "wave_form_first_name", get_post_meta($post->ID, "wave_form_first_name", true));

        $WF_AdminOptions->enableDisable("Last Name", "wave_form_last_name", get_post_meta($post->ID, "wave_form_last_name", true));

        $WF_AdminOptions->enableDisable("Email", "wave_form_email", get_post_meta($post->ID, "wave_form_email", true));

        $WF_AdminOptions->enableDisable("Phone Number", "wave_form_phone_number", get_post_meta($post->ID, "wave_form_phone_number", true));

        $WF_AdminOptions->enableDisable("Twitter Username", "wave_form_twitter", get_post_meta($post->ID, "wave_form_twitter", true));

        $WF_AdminOptions->enableDisable("Company Name", "wave_form_company", get_post_meta($post->ID, "wave_form_company", true));

        $WF_AdminOptions->enableDisable("Website", "wave_form_website", get_post_meta($post->ID, "wave_form_website", true));

        $WF_AdminOptions->enableDisable("Message", "wave_form_message", get_post_meta($post->ID, "wave_form_message", true));

        $WF_AdminOptions->tableEnd();
    }

    static function save_settings($post_id) {
        if(!isset($_POST["wave_form_settings_nonce"])) {
            return($post_id);
        }

        if(!wp_verify_nonce($_POST["wave_form_settings_nonce"], "wave_form_update_settings")) {
            return($post_id);
        }

        if((defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)) {
            return($post_id);
        }

        if($_POST["post_type"] == "wave-form") {
            if(!current_user_can("edit_page", $post_id)) {
                return($post_id);
            }
        }
        else {
            return($post_id);
        }

        $PostKeys = array_keys($_POST);

        foreach($PostKeys as $PostKey) {
            if(preg_match("/^wave_form/", $PostKey)) {
                update_post_meta($post_id, $PostKey, $_POST[$PostKey]);
            }
        }
    }

}

add_action("init", array("WF_Forms", "register_post_type"));
add_action("add_meta_boxes", array("WF_Forms", "meta_box"));
add_action("save_post", array("WF_Forms", "save_settings"));

?>