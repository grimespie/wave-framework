<?php

/**
 *
 * Load Admin
 *
 */

include_once("WF_AdminOptions.php");

include_once("dashboard/WF_AnalyticsWidget.php");
include_once("dashboard/WF_WidgetLeads.php");
include_once("dashboard/WF_WidgetSummary.php");

include_once("options/WF_General.php");
include_once("options/WF_Layout.php");
include_once("options/WF_Header.php");
include_once("options/WF_Footer.php");
include_once("options/WF_Typography.php");
include_once("options/WF_Styling.php");
include_once("options/WF_Blog.php");
include_once("options/WF_CustomPosts.php");
include_once("options/WF_LandingPages.php");
include_once("options/WF_SocialMedia.php");
include_once("options/WF_CustomCSS.php");

include_once("tools/WF_Forms.php");
include_once("tools/WF_CTAs.php");
include_once("tools/WF_Emails.php");

class WaveAdmin {

    public function add_templates_page() {
        add_submenu_page("themes.php", "Templates", "Templates", "install_themes", "wave-theme-templates", array("WaveAdmin", "templates_page_content"));
    }

    public function add_settings_page() {
        add_submenu_page("themes.php", "Theme Options", "Theme Options", "install_themes", "wave-theme-options", array("WaveAdmin", "options_page_content"));
    }

    public function templates_page_content() {
    ?>

    <div class="wrap" id="wave-theme-options">
        <div id="wave-template-row-settings-get" data-url="<?php print(get_template_directory_uri()); ?>/framework/admin/settings/get_row_settings.php"></div>
        <div id="wave-template-module-settings-get" data-url="<?php print(get_template_directory_uri()); ?>/framework/admin/settings/get_module_settings.php"></div>
        <div id="wave-template-row-settings-save" data-url="<?php print(get_template_directory_uri()); ?>/framework/admin/settings/save_row_settings.php"></div>
        <div id="wave-template-module-settings-save" data-url="<?php print(get_template_directory_uri()); ?>/framework/admin/settings/save_module_settings.php"></div>
        <h2>Templates</h2>

            <?php
            if(isset($_POST["wave-templates-submitted"])) {
                ?>

                <div id="message" class="updated below-h2"><p>Template saved.</p></div>

            <?php
            }
            ?>

            <div id="nav-menus-frame">
                <div id="menu-settings-column" class="metabox-holder">
                    <div class="clear"></div>
                    <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
                        <div id="side-sortables" class="accordion-container">
                            <ul class="outer-border">
                                <li class="control-section accordion-section" id="add-page">
                                    <h3 class="accordion-section-title hndle active" tabindex="0" title="Home Page" data-option="general">Home Page</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Contact Page" data-option="layout">Contact Page</h3>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div id="menu-management-liquid">
                    <div id="menu-management">
                        <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="wave-templates-submitted" value="1" />
                            <input type="hidden" name="wave_template_admin_content" value="" class="wave-template-admin-content" />
                            <div class="menu-edit blank-slate">
                                <input type="hidden" name="menu" id="menu" value="0">
                                <div id="nav-menu-header">
                                    <div class="major-publishing-actions">
                                        <label class="menu-name-label howto open-label" for="template-name">
                                            <span>Template Name</span>
                                            <input name="template-name" id="template-name" type="text" class="menu-name regular-text menu-item-textbox input-with-default-title" title="Enter menu name here" value="">
                                        </label>
                                        <div class="publishing-action">
                                            <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary menu-save" value="Save Template">
                                        </div>
                                    </div>
                                </div>
                                <div id="wave-template-wrapper">
                                    <div id="wave-template-sandbox">
                                    <?php if(isset($_POST["wave_template_admin_content"])) { print(stripslashes($_POST["wave_template_admin_content"])); } ?>
                                    </div>
                                    <div id="wave-template-add-row"><a class="button">Add Row</a></div>
                                </div>
                                <div id="nav-menu-footer">
                                    <div class="major-publishing-actions">
                                        <span class="delete-action">
                                            <a class="submitdelete deletion menu-delete template-delete" href="/wave/wp-admin/nav-menus.php?action=delete&amp;menu=2&amp;0=http%3A%2F%2Fwearedeveloping.net%2Fwave%2Fwp-admin%2F&amp;_wpnonce=82e779a986">Delete Template</a>
                                        </span>
                                        <div class="publishing-action">
                                            <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary menu-save" value="Save Template">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    public function options_page_content() {
    ?>

    <div class="wrap" id="wave-theme-options">
        <h2>Theme Options</h2>

            <?php
            if(isset($_POST["wave-settings-submitted"])) {
                $FormKeys = array_keys($_POST);

                foreach($FormKeys as $Key) {
                    if(preg_match("/^wave_/", $Key)) {
                        update_option($Key, $_POST[$Key]);
                    }
                }
                ?>

                <div id="message" class="updated below-h2"><p>Settings saved.</p></div>

            <?php
            }
            ?>

            <div id="nav-menus-frame">
                <div id="menu-settings-column" class="metabox-holder">
                    <div class="clear"></div>
                    <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
                        <div id="side-sortables" class="accordion-container">
                            <ul class="outer-border">
                                <li class="control-section accordion-section" id="add-page">
                                    <h3 class="accordion-section-title hndle active" tabindex="0" title="General" data-option="general"><i class="fa fa-cog"></i>General</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Layout" data-option="layout"><i class="fa fa-th"></i>Layout</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Header" data-option="header"><i class="fa fa-columns"></i>Header</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Footer" data-option="footer"><i class="fa fa-columns fa-flip-vertical"></i>Footer</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Typography" data-option="typography"><i class="fa fa-font"></i>Typography</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Styling" data-option="styling"><i class="fa fa-pencil"></i>Styling</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Blog" data-option="blog"><i class="fa fa-quote-left"></i>Blog</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Custom Post Types" data-option="customposts"><i class="fa fa-twitter"></i>Custom Post Types</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Landing Pages" data-option="landingpages"><i class="fa fa-twitter"></i>Landing Pages</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Social Media" data-option="socialmedia"><i class="fa fa-twitter"></i>Social Media</h3>
                                </li>
                                <li class="control-section accordion-section" id="add-post">
                                    <h3 class="accordion-section-title hndle" tabindex="0" title="Custom CSS" data-option="customcss"><i class="fa fa-css3"></i>Custom CSS</h3>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div id="menu-management-liquid">
                    <div id="menu-management">
                        <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="wave-settings-submitted" value="1" />
                            <div class="menu-edit blank-slate">
                                <input type="hidden" name="menu" id="menu" value="0">
                                <div id="nav-menu-header">
                                    <div class="major-publishing-actions">
                                        <div class="publishing-action">
                                            <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary menu-save" value="Save Settings">
                                        </div>
                                    </div>
                                </div>
                                <div id="post-body">
                                    <div id="post-body-content">
                                        
                                                <div class="wave-options-panel" id="wave-options-general">
                                                    <?php
                                                    $WF_General = new WF_General();
                                                    $WF_General->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-layout">
                                                    <?php
                                                    $WF_Layout = new WF_Layout();
                                                    $WF_Layout->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-header">
                                                    <?php
                                                    $WF_Header = new WF_Header();
                                                    $WF_Header->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-footer">
                                                    <?php
                                                    $WF_Footer = new WF_Footer();
                                                    $WF_Footer->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-typography">
                                                    <?php
                                                    $WF_Typography = new WF_Typography();
                                                    $WF_Typography->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-styling">
                                                    <?php
                                                    $WF_Styling = new WF_Styling();
                                                    $WF_Styling->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-blog">
                                                    <?php
                                                    $WF_Blog = new WF_Blog();
                                                    $WF_Blog->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-customposts">
                                                    <?php
                                                    $WF_CustomPosts = new WF_CustomPosts();
                                                    $WF_CustomPosts->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-landingpages">
                                                    <?php
                                                    $WF_LandingPages = new WF_LandingPages();
                                                    $WF_LandingPages->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-socialmedia">
                                                    <?php
                                                    $WF_SocialMedia = new WF_SocialMedia();
                                                    $WF_SocialMedia->options();
                                                    ?>
                                                </div>
                                                <div class="wave-options-panel" id="wave-options-customcss">
                                                    <?php
                                                    $WF_CustomCSS = new WF_CustomCSS();
                                                    $WF_CustomCSS->options();
                                                    ?>
                                                </div>

                                    </div>
                                </div>
                                <div id="nav-menu-footer">
                                    <div class="major-publishing-actions">
                                        <span id="wave-footer-thankyou">Wave Framework. Version 1.0</span>
                                        <div class="publishing-action">
                                            <input type="submit" name="save_menu" id="save_menu_header" class="button button-primary menu-save" value="Save Settings">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    <?php
    }

}

add_action("admin_menu", array("WaveAdmin", "add_settings_page"));
add_action("admin_menu", array("WaveAdmin", "add_templates_page"));

?>