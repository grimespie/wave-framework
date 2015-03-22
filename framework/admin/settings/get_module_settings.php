<?php

include_once("load_wp.php");

$ModuleID = $_GET["module_id"];

?>

<div id="wave-row-settings" class="media-modal wp-core-ui">
    <a class="media-modal-close" href="#" title="Close">
        <span class="media-modal-icon"></span>
    </a>
    <div class="media-modal-content">
        <div class="media-frame wp-core-ui hide-router" id="__wp-uploader-id-0">
            <div class="media-frame-menu">
                <div class="media-menu"><a href="#" class="media-menu-item active">Module Settings</a></div>
            </div>
            <div class="media-frame-title"><h1>Module Settings</h1></div>
            <div class="media-frame-content">
                <div class="media-embed">
                    <div class="embed-link-settings">
                        <label class="setting"><span>Custom Classes</span><input type="text" class="alignment" data-setting="custom-classes"></label>
                        <label class="setting"><span>Custom ID</span><input type="text" class="alignment" data-setting="custom-id"></label>
                        <label class="setting"><span>Custom CSS</span><textarea data-setting="custom-css"></textarea></label>
                    </div>
                </div>
            </div>
            <div class="media-frame-toolbar">
                <div class="media-toolbar">
                    <div class="media-toolbar-secondary"></div>
                    <div class="media-toolbar-primary"><a href="#" class="button media-button button-primary button-large media-button-select">Save Settings</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
