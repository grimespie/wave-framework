<?php

class WF_Styling extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->title("General");

        $this->colorPicker("Accent Color", "wave_accent_color", get_option("wave_accent_color"));

        $this->colorPicker("Link Color", "wave_link_color", get_option("wave_link_color"));

        $this->colorPicker("Link Hover Color", "wave_linkhover_color", get_option("wave_linkhover_color"));

        $this->title("Header");

        $this->colorPicker("Topbar Background Color", "wave_topbar_bg_color", get_option("wave_topbar_bg_color"));

        $this->colorPicker("Topbar Bottom Border Color", "wave_topbar_border_color", get_option("wave_topbar_border_color"));

        $this->colorPicker("Header Background Color", "wave_header_bg_color", get_option("wave_header_bg_color"));

        $this->colorPicker("Header Bottom Border Color", "wave_header_border_color", get_option("wave_header_border_color"));

        $this->colorPicker("Titlebar Background Color", "wave_titlebar_bg_color", get_option("wave_titlebar_bg_color"));

        $this->colorPicker("Titlebar Bottom Border Color", "wave_titlebar_border_color", get_option("wave_titlebar_border_color"));

        $this->title("Navigation");

        $this->colorPicker("Navigation Link Color", "wave_navigation_link_color", get_option("wave_navigation_link_color"));

        $this->colorPicker("Navigation Link Hover Color", "wave_navigation_linkhover_color", get_option("wave_navigation_linkhover_color"));

        $this->colorPicker("Navigation Background Color", "wave_navigation_bg_color", get_option("wave_navigation_bg_color"));

        $this->colorPicker("Navigation Border Color", "wave_navigation_border_color", get_option("wave_navigation_border_color"));

        $this->colorPicker("Sub-menu Background Color", "wave_submenu_bg_color", get_option("wave_submenu_bg_color"));

        $this->colorPicker("Sub-menu Border Color", "wave_submenu_border_color", get_option("wave_submenu_border_color"));

        $this->colorPicker("Sub-menu Link Color", "wave_submenu_link_color", get_option("wave_submenu_link_color"));

        $this->colorPicker("Sub-menu Link Hover Color", "wave_submenu_linkhover_color", get_option("wave_submenu_linkhover_color"));

        $this->title("Footer");

        $this->colorPicker("Footer Background Color", "wave_footer_bg_color", get_option("wave_footer_bg_color"));

        $this->colorPicker("Footer Top Border Color", "wave_footer_border_color", get_option("wave_footer_border_color"));

        $this->colorPicker("Footer Text Color", "wave_footer_text_color", get_option("wave_footer_text_color"));

        $this->colorPicker("Footer Link Color", "wave_footer_link_color", get_option("wave_footer_link_color"));

        $this->colorPicker("Footer Link Hover Color", "wave_footer_linkhover_color", get_option("wave_footer_linkhover_color"));

        $this->colorPicker("Copyright Background Color", "wave_copyright_bg_color", get_option("wave_copyright_bg_color"));

        $this->colorPicker("Copyright Text Color", "wave_copyright_text_color", get_option("wave_copyright_text_color"));

        $this->colorPicker("Copyright Link Color", "wave_copyright_link_color", get_option("wave_copyright_link_color"));

        $this->colorPicker("Copyright Link Hover Color", "wave_copyright_linkhover_color", get_option("wave_copyright_linkhover_color"));

        $this->tableEnd();
    }

}

?>