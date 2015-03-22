<?php

class WF_Module {

    private $id   = 0;
    private $slug = "";
    private $name = "";
    private $settings = array();

    private add_setting_html($label, $type) {
        if($type == "text") {
            array_push($this->settings, '<label class="setting"><span>' . $label . '</span><input type="text" class="alignment" data-setting="' . preg_replace("/ /", "", strtolower($label)) . '"></label>');
        }
    }

    public function add_setting($label, $type) {
        $this->add_setting_html($label, $type);
    }

    public function add_module() {
    }

    public function display_settings() {
        foreach($this->settings as $setting) {
            print($setting);
        }
    }

}

?>