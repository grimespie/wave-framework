<?php

class WF_WidgetSummary {

    function dashboard_at_a_glance() {
        /*
        // Custom Posts
        $post_types = array("wedding-themes");

        foreach($post_types as $pt) {
            $pt_info = get_post_type_object($pt); // get a specific CPT's details
            $num_posts = wp_count_posts($pt); // retrieve number of posts associated with this CPT
            $num = number_format_i18n($num_posts->publish); // number of published posts for this CPT
            $text = _n( $pt_info->labels->singular_name, $pt_info->labels->name, intval($num_posts->publish) ); // singular/plural text label for CPT
            echo '<li class="page-count '.$pt_info->name.'-count"><a href="edit.php?post_type='.$pt.'">'.$num.' '.$text.'</a></li>';
        }
        */

        print('<li class="page-count ' . strtolower(date("F")) . '-visit-count"><a href="">5 Visits</a></li>');
    }

}

add_action("dashboard_glance_items", array("WF_WidgetSummary", "dashboard_at_a_glance"));

?>