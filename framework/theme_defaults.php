<?php

/**
 *
 * Theme defaults
 *
 */

// Theme Support
add_theme_support("menus");
add_theme_support("post-thumbnails");
add_theme_support("woocommerce");

// Register Functionality
register_nav_menu("primary", "Primary Menu");
register_nav_menu("top-bar", "Top Bar Menu");
register_nav_menu("footer", "Footer Menu");

// Image Sizes
add_image_size("shop_catalog", 225, 250, true);

?>