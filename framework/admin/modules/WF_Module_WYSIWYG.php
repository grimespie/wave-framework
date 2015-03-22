<?php

include_once("WF_Module.php");

class WF_Module_WYSIWYG extends WF_Module {

    public function __construct() {
        $this->slug = "module-wysiwyg";
        $this->name = "Text Editor";
    }

    public function settings() {
        $this->add_setting("Label", "input");
    }

}

add_action("wave_template_modules", array("WF_Module_WYSIWYG", "add_module"));

?>