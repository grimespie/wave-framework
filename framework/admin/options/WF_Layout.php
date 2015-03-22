<?php

class WF_Layout extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->enableDisable("Responsive", "wave_responsive", get_option("wave_responsive"), "Enable/Disable website responsiveness");

        $this->enableDisable("Zoom", "wave_zoom", get_option("wave_zoom"), "Enable/Disable zoom on mobile devices");

        $this->select("Layout Style", "wave_layout", array(array("label" => "Full width", "value" => "full-width"),
                                                           array("label" => "Boxed", "value" => "boxed")), get_option("wave_layout"), "Boxed or full width");

        $this->tableEnd();
    }

}

?>