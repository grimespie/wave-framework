<?php

class WF_AnalyticsWidget {

    function dashboard_widget_analytics() {
        wp_add_dashboard_widget(
                                "wave_dashboard_analytics",
                                "Visits",
                                array("WF_AnalyticsWidget", "dashboard_widget_analytics_contents")
        );
    }

    function dashboard_widget_analytics_contents() {
        global $WaveDB;

        $Days                  = $WaveDB->get_unique_daily_visits();
        $DaysLastMonth         = $WaveDB->get_unique_daily_visits(date("n", strtotime("first day of previous month")), date("Y", strtotime("first day of previous month")));
        $DataList              = array();
        $DataListLastMonth     = array();
        $Data                  = "[";
        $DataLastMonth         = "[";
        $Sep                   = ", ";
        $NumberOfDays          = cal_days_in_month(CAL_GREGORIAN, date("n"), date("Y"));
        $NumberOfDaysLastMonth = cal_days_in_month(CAL_GREGORIAN, date("n", strtotime("first day of previous month")), date("Y", strtotime("first day of previous month")));

        foreach($Days as $Day) {
            $DataList[$Day->day] = $Day;
        }

        foreach($DaysLastMonth as $Day) {
            $DataListLastMonth[$Day->day] = $Day;
        }

        for($Loop=1; $Loop<=$NumberOfDays; $Loop++) {
            if($Loop == $NumberOfDays) {
                $Sep = "";
            }

            if(array_key_exists($Loop, $DataList)) {
                $Data .= $DataList[$Loop]->total . $Sep;
            }
            else {
                $Data .= "0" . $Sep;
            }
        }

        $Data .= "]";

        $Sep = ", ";

        for($Loop=1; $Loop<=$NumberOfDaysLastMonth; $Loop++) {
            if($Loop == $NumberOfDaysLastMonth) {
                $Sep = "";
            }

            if(array_key_exists($Loop, $DataListLastMonth)) {
                $DataLastMonth .= $DataListLastMonth[$Loop]->total . $Sep;
            }
            else {
                $DataLastMonth .= "0" . $Sep;
            }
        }

        $DataLastMonth .= "]";

        print('<div id="wave-dashboard-analytics" data-input="' . $Data . '" data-input-last="' . $DataLastMonth . '"></div>');
    }

}

add_action("wp_dashboard_setup", array("WF_AnalyticsWidget", "dashboard_widget_analytics"));

?>