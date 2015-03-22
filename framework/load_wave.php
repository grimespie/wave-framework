<?php

/**
 *
 * Load Wave Framework
 *
 */

// Wave Class
include_once("classes/Wave.php");
include_once("classes/WaveDB.php");
include_once("classes/ContactForm.php");

$Wave   = new Wave();
$WaveDB = new WaveDB();


// Main Files
include_once("functions.php");
include_once("theme_defaults.php");
include_once("enqueue.php");


// Admin
include_once("admin/load_admin.php");


// Shortcodes
include_once("shortcodes/boxes.php");
include_once("shortcodes/buttons.php");
include_once("shortcodes/columns.php");
include_once("shortcodes/contact_form.php");
include_once("shortcodes/dividers.php");
include_once("shortcodes/icons.php");
include_once("shortcodes/lists.php");
include_once("shortcodes/maps.php");
include_once("shortcodes/parallax.php");
include_once("shortcodes/sliders.php");
include_once("shortcodes/tables.php");
include_once("shortcodes/tabs.php");
include_once("shortcodes/toggles.php");
include_once("shortcodes/typography.php");

?>