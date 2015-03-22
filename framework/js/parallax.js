/**
 *
 * Parallax Javascript
 *
 */

jQuery(document).ready(function() {

    function parallax() {
        if((jQuery(window).width() >= 767) || ((jQuery(window).width() < 767) && (!jQuery("div#wave-js-params").data("mobile-not-parallax")))) {
            jQuery("nav.menu-primary-navigation-container ul li").each(function() {
                jQuery(this).children("a").removeAttr("href");
                jQuery(this).css("cursor", "pointer");
            });

            jQuery("nav.menu-primary-navigation-container ul li").click(function() {
                var page_id      = "page-" + jQuery(this).attr("id");
                var page_padding = 0;

                if(jQuery("div#wave-js-params").data("fixed-header")) {
                    if(jQuery("header#header-wrapper").css("position") == "fixed") {
                        page_padding = parseInt(jQuery("header#header-wrapper").css("height"));
                    }
                }

                jQuery("html, body").animate({
                    scrollTop: jQuery("#" + page_id).offset().top - page_padding
                }, 1500);

                jQuery("nav.menu-primary-navigation-container ul li").removeClass("current-menu-item");
                jQuery("nav.menu-primary-navigation-container ul li").removeClass("current_page_item");

                jQuery(this).addClass("current-menu-item");
                jQuery(this).addClass("current_page_item");
            });
        }
    }

    parallax();

    jQuery(window).resize(function() { parallax(); });

});