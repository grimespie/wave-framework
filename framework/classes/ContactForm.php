<?php

class ContactForm {

    private $id     = "";
    private $fields = array();

    public function __construct($id) {
        $this->id = $id;

        $this->loadFields();
    }

    public function loadFields() {
        array_push($this->fields, array("name" => "wave_form_first_name", "value" => get_post_meta($this->id, "wave_form_first_name", true)));
        array_push($this->fields, array("name" => "wave_form_last_name", "value" => get_post_meta($this->id, "wave_form_last_name", true)));
        array_push($this->fields, array("name" => "wave_form_email", "value" => get_post_meta($this->id, "wave_form_email", true)));
        array_push($this->fields, array("name" => "wave_form_phone_number", "value" => get_post_meta($this->id, "wave_form_phone_number", true)));
        array_push($this->fields, array("name" => "wave_form_twitter", "value" => get_post_meta($this->id, "wave_form_twitter", true)));
        array_push($this->fields, array("name" => "wave_form_company", "value" => get_post_meta($this->id, "wave_form_company", true)));
        array_push($this->fields, array("name" => "wave_form_website", "value" => get_post_meta($this->id, "wave_form_website", true)));
        array_push($this->fields, array("name" => "wave_form_message", "value" => get_post_meta($this->id, "wave_form_message", true)));
    }

    public function input($label, $name) {
        $Input = '';

        $Input .= '<p>' . $label . '<br>';
        $Input .= '<span class="wave-form-input-wrapper">';
        $Input .= '<input type="text" id="' . $name . '" name="' . $name . '" value="" size="40" class="wave-form-input" />';
        $Input .= '</span>';
        $Input .= '</p>';

        return($Input);
    }

    public function generateForm() {
        $Form  = '<form class="wave-form" id="wave-form-' . $this->id . '" action="" method="post">';
        $Form .= '<input type="hidden" name="wave_form_id" value="' . $this->id . '" />';

        foreach($this->fields as $Field) {
            if($Field["value"] == "enabled") {
                if($Field["name"] == "wave_form_first_name") {
                    $Form .= $this->input("First Name", "first_name");
                }
                else if($Field["name"] == "wave_form_last_name") {
                    $Form .= $this->input("Last Name", "last_name");
                }
                else if($Field["name"] == "wave_form_email") {
                    $Form .= $this->input("Email", "email");
                }
                else if($Field["name"] == "wave_form_phone_number") {
                    $Form .= $this->input("Phone Number", "phone_number");
                }
                else if($Field["name"] == "wave_form_twitter") {
                    $Form .= $this->input("Twitter Username", "twitter_username");
                }
                else if($Field["name"] == "wave_form_company") {
                    $Form .= $this->input("Company Name", "company_name");
                }
                else if($Field["name"] == "wave_form_website") {
                    $Form .= $this->input("Website", "website");
                }
            }
        }

        $Form .= '<p><input type="submit" value="Submit" /></p></form>';

        return($Form);
    }

    public function formActions() {
    }

}

?>