<?php

class WF_Footer extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->title("Footer");

        $this->enableDisable("Widget Area", "wave_footer_widgetarea", get_option("wave_footer_widgetarea"), "Enable/Disable the footer widget area");

        $this->select("Number of Widget Columns", "wave_footer_columncount", array(array("label" => "1", "value" => "1"),
                                                                                   array("label" => "2", "value" => "2"),
                                                                                   array("label" => "3", "value" => "3"),
                                                                                   array("label" => "4", "value" => "4")), get_option("wave_footer_columncount"));

        $this->title("Copyright bar");

        $this->enableDisable("Copyright Bar", "wave_footer_copyrightbar", get_option("wave_footer_copyrightbar"), "Enable/Disable the footer copyright bar");

        $this->inputBox("Copyright Text", "wave_copyright_text", get_option("wave_copyright_text"));

        $this->enableDisable("Social Icons", "wave_footer_socialicons", get_option("wave_footer_socialicons"), "Enable/Disable the footer social icons");

        $this->tableEnd();
    }

}

?>