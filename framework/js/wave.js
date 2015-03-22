/**
 *
 * Wave Javascript
 *
 */

jQuery(document).ready(function() {

    /**
     * Navigation Position
     */
    function navigation_position() {
        jQuery("nav.menu-primary-navigation-container").css("opacity", "0");
        jQuery("header#header-wrapper").imagesLoaded(function() {
            jQuery("nav.menu-primary-navigation-container").css("opacity", "1");
            jQuery("nav.menu-primary-navigation-container").css("line-height", (parseInt(jQuery("img#logo").css("height")) + parseInt(jQuery("img#logo").css("margin-top")) + parseInt(jQuery("img#logo").css("margin-bottom"))) + "px");
        });
    }

    //navigation_position();

    // Fixed Header
    if(jQuery("div#wave-js-params").data("fixed-header")) {
        function fixed_header() {
            if(jQuery("header#header-wrapper").css("position") == "fixed") {
                jQuery("div#main-wrapper").css("opacity", "0");
                jQuery("header#header-wrapper").imagesLoaded(function() {
                    jQuery("div#main-wrapper").css("padding-top", jQuery("header#header-wrapper").css("height"));
                    jQuery("div#main-wrapper").css("opacity", "1");
                });
            }
            else {
                jQuery("div#main-wrapper").css("padding-top", 0);
            }
        }

        fixed_header();

        jQuery(window).resize(function() { fixed_header(); });
    }


    /**
     * Fixed Footer
     */
    if(jQuery("div#wave-js-params").data("fixed-footer")) {
        jQuery("footer#footer-wrapper").imagesLoaded(function() {
            function fixed_footer() {
                if(jQuery("footer#footer-wrapper").css("position") == "absolute") {
                    jQuery("div#main-wrapper").css("padding-bottom", jQuery("footer#footer-wrapper").css("height"));
                }
                else {
                    jQuery("div#main-wrapper").css("padding-bottom", 0);
                }
            }

            fixed_footer();

            jQuery(window).resize(function() { fixed_footer(); });
        });
    }


    /**
     * Header Animation
     */
    if(jQuery("div#wave-js-params").data("animated-header")) {
        function animate_header() {
            if(jQuery("header#header-wrapper").css("position") == "fixed") {
                jQuery("nav.menu-primary-navigation-container").css("opacity", "0");
                jQuery("header#header-wrapper").imagesLoaded(function() {
                    jQuery("nav.menu-primary-navigation-container").css("opacity", "1");
                    var header_height  = parseInt(jQuery("header#header-wrapper").css("height"));
                    var logo_height    = parseInt(jQuery("img#logo").css("height"));
                    var new_height     = 26;
                    var top_bar_height = jQuery("div#header-top-bar").css("height");

                    // init
                    jQuery("img#logo").css("width", "auto");
                    jQuery("nav.menu-primary-navigation-container").css("line-height", (parseInt(jQuery("img#logo").css("height")) + parseInt(jQuery("img#logo").css("margin-top")) + parseInt(jQuery("img#logo").css("margin-bottom"))) + "px");

                    // if we scroll
                    jQuery(window).scroll(function() {
                        if((jQuery(window).scrollTop() < header_height) && (jQuery("header#header-wrapper").hasClass("animated-header"))) {
                            jQuery("img#logo").animate({height: logo_height + "px"}, 100);
                            jQuery("header#header-wrapper").removeClass("animated-header");
                            jQuery("nav.menu-primary-navigation-container").animate({"line-height": logo_height + parseInt(jQuery("img#logo").css("margin-top")) + parseInt(jQuery("img#logo").css("margin-bottom")) + "px"}, 100);

                            if(jQuery("div#wave-js-params").data("hide-topbar")) {
                                jQuery("div#header-top-bar").animate({height: "100%", "min-height": top_bar_height, opacity: 1}, 100);
                            }

                            jQuery("#header-3 #header-search-form").animate({"margin-top": "28px"}, 100);
                        }
                        else if((jQuery(window).scrollTop() >= header_height) && (!jQuery("header#header-wrapper").hasClass("animated-header"))) {
                            jQuery("img#logo").animate({height: new_height + "px"}, 100);
                            jQuery("header#header-wrapper").addClass("animated-header");
                            jQuery("nav.menu-primary-navigation-container").animate({"line-height": new_height + parseInt(jQuery("img#logo").css("margin-top")) + parseInt(jQuery("img#logo").css("margin-bottom")) + "px"}, 100);

                            if(jQuery("div#wave-js-params").data("hide-topbar")) {
                                jQuery("div#header-top-bar").animate({height: 0, opacity: 0, "min-height": 0}, 100);
                            }

                            jQuery("#header-3 #header-search-form").animate({"margin-top": "13px"}, 100);
                        }
                    });
                });
            }
        }

        animate_header();

        jQuery(window).resize(function() { animate_header(); });
    }


    /**
     * Back To Top
     */
    jQuery(window).scroll(function() {
        if(jQuery(window).scrollTop() >= 350) {
            jQuery("div#back-to-top").show();
        }
        else {
            jQuery("div#back-to-top").hide();
        }
    });

    jQuery("div#back-to-top").click(function() {
        jQuery("body,html").animate({scrollTop:0}, 500);

        return(false);
    });

});