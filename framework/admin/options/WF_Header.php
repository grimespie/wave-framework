<?php

class WF_Header extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->title("Header");

        $this->select("Header Layout", "wave_header_layout", array(array("label" => "Header 1", "value" => "1"),
                                                                   array("label" => "Header 2", "value" => "2"),
                                                                   array("label" => "Header 3", "value" => "3")), get_option("wave_header_layout"), "Choose the header layout");

        $this->uploadImage("Logo", "wave_logo", get_option("wave_logo"), "Upload the main website logo");

        $this->inputBox("Logo Top Margin", "wave_logo_top_margin", get_option("wave_logo_top_margin"), "The margin applied to the top of the logo (px)");

        $this->inputBox("Logo Bottom Margin", "wave_logo_bottom_margin", get_option("wave_logo_bottom_margin"), "The margin applied to the bottom of the logo (px)");

        $this->enableDisable("Sticky Header", "wave_sticky_header", get_option("wave_sticky_header"), "Enable/Disable sticky header");

        $this->title("Topbar");

        $this->enableDisable("Topbar", "wave_topbar", get_option("wave_topbar"), "Enable/Disable the header topbar");

        $TopBarOptions = array(array("label" => "Nothing", "value" => "nothing"),
                               array("label" => "Social Icons", "value" => "social-icons"),
                               array("label" => "Contact Info", "value" => "contact-information"),
                               array("label" => "Search Form", "value" => "search-form"),
                               array("label" => "Navigation", "value" => "navigation"));

        $this->select("Topbar Left", "wave_topbar_left", $TopBarOptions, get_option("wave_topbar_left"), "Choose what you want to display on the left of the topbar");

        $this->select("Topbar Right", "wave_topbar_right", $TopBarOptions, get_option("wave_topbar_right"), "Choose what you want to display on the right of the topbar");

        $this->tableEnd();
    }

}

?>