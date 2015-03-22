<?php

class WF_WidgetLeads {

    function dashboard_widget_leads() {
        wp_add_dashboard_widget(
                                "wave_dashboard_leads",
                                "Leads",
                                array("WF_WidgetLeads", "dashboard_widget_leads_contents")
        );
    }

    function dashboard_widget_leads_contents() {
        global $WaveDB;
    }

}

add_action("wp_dashboard_setup", array("WF_WidgetLeads", "dashboard_widget_leads"));

?>