<?php

/**
 *
 * Wave Master Class
 *
 */

class WaveDB {

    public $wave_analytics       = "wave_analytics";
    public $wave_templates       = "wave_templates";
    public $wave_module_settings = "wave_module_settings";

    public function __construct() {
        $this->init();
    }

    public function init() {
        global $wpdb;

        $this->set_analytics_id();

        add_action("after_switch_theme", array($this, "install_theme_tables"));
        //add_action("wp_footer", array($this, "record_visit"));

        $this->wave_analytics       = $wpdb->prefix . $this->wave_analytics;
        $this->wave_templates       = $wpdb->prefix . $this->wave_templates;
        $this->wave_module_settings = $wpdb->prefix . $this->wave_module_settings;
    }

    public function install_theme_tables() {
        global $wpdb;

        if($wpdb->get_var('show tables like "' . $this->wave_analytics . '"') != $this->wave_analytics) {
            $this->create_wave_analytics();
        }

        if($wpdb->get_var('show tables like "' . $this->wave_templates . '"') != $this->wave_templates) {
            $this->create_wave_templates();
        }

        if($wpdb->get_var('show tables like "' . $this->wave_module_settings . '"') != $this->wave_module_settings) {
            $this->create_wave_module_settings();
        }
    }

    public function create_wave_analytics() {
        global $wpdb;

        $wpdb->query('create table ' . $this->wave_analytics . ' (
                          id           int          not null AUTO_INCREMENT,
                          analytics_id varchar(99)  null,
                          url          varchar(999) null,
                          user_agent   varchar(999) null,
                          referrer     varchar(999) null,
                          user_ip      varchar(99)  null,
                          time         int          null,
                          page_id      int          null,
                          day          int          null,
                          month        int          null,
                          year         int          null,
                          primary key (id)
                      )');
    }

    public function create_wave_templates() {
        global $wpdb;

        $wpdb->query('create table ' . $this->wave_templates . ' (
                          id                     int          not null AUTO_INCREMENT,
                          template_name          varchar(99)  null,
                          template_admin_content longtext     null,
                          template_theme_content longtext     null,
                          primary key (id)
                      )');
    }

    public function create_wave_module_settings() {
        global $wpdb;

        $wpdb->query('create table ' . $this->wave_module_settings . ' (
                          id                     int          not null AUTO_INCREMENT,
                          template_id            int          null,
                          module_slug            varchar(99)  null,
                          module_settings        longtext     null,
                          primary key (id)
                      )');
    }

    public function save_template() {
        global $wpdb;

        $wpdb->replace(
                       $this->wave_templates,
                       array(),
                       array()
                      );
    }

    public function set_analytics_id() {
        if(isset($_COOKIE["analytics_id"])) {
            setcookie("analytics_id", $_COOKIE["analytics_id"], time() + (365 * 24 * 60 * 60));
        }
        else {
            setcookie("analytics_id", $_SERVER["REMOTE_ADDR"] . "-" . rand(1, 999999), time() + (365 * 24 * 60 * 60));
        }
    }

    public function get_analytics_id() {
        return($_COOKIE["analytics_id"]);
    }

    public function record_visit() {
        global $wpdb;
        global $post;

        $wpdb->insert(
                      $this->wave_analytics,
                      array(
                            "analytics_id" => $this->get_analytics_id(),
                            "url"          => $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],
                            "user_agent"   => $_SERVER["HTTP_USER_AGENT"],
                            "referrer"     => $_SERVER["HTTP_REFERER"],
                            "user_ip"      => $_SERVER["REMOTE_ADDR"],
                            "time"         => $_SERVER["REQUEST_TIME"],
                            "page_id"      => $post->ID,
                            "day"          => date("j", $_SERVER["REQUEST_TIME"]),
                            "month"        => date("n", $_SERVER["REQUEST_TIME"]),
                            "year"         => date("Y", $_SERVER["REQUEST_TIME"])
                           ),
                      array(
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%d',
                            '%d',
                            '%d',
                            '%d',
                            '%d'
                           )
                     );
    }

    public function get_visits($month="", $year="") {
        global $wpdb;

        if($month == "") {
            $month = date("n");
        }

        if($year == "") {
            $year = date("Y");
        }

        return($wpdb->get_results("select * from " . $this->wave_analytics . " where month = " . $month . " and year = " . $year));
    }

    public function get_daily_visits($month="", $year="") {
        global $wpdb;

        if($month == "") {
            $month = date("n");
        }

        if($year == "") {
            $year = date("Y");
        }

        return($wpdb->get_results("select day, month, year, count(*) as total from " . $this->wave_analytics . " where month = " . $month . " and year = " . $year . " group by day, month, year"));
    }

    public function get_unique_daily_visits($month="", $year="") {
        global $wpdb;

        if($month == "") {
            $month = date("n");
        }

        if($year == "") {
            $year = date("Y");
        }

        return($wpdb->get_results("select day, month, year, count(distinct(analytics_id)) as total from " . $this->wave_analytics . " where month = " . $month . " and year = " . $year . " group by day, month, year order by day, month, year, analytics_id asc"));
    }

}

?>