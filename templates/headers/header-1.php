        <div id="header-1">
            <div id="top-bar">
                <div class="container">
                    <div class="col-10 col-s-20 col-s-center">
                        <?php
                        if(is_user_logged_in()) {
                            $Args = array(
                                          "theme_location" => "topbar-loggedin",
                                          "container"      => "nav",
                                          "container_id"   => "topbar"
                                         );
                            
                            wp_nav_menu($Args);
                        }
                        else {
                            $Args = array(
                                          "theme_location" => "topbar",
                                          "container"      => "nav",
                                          "container_id"   => "topbar"
                                         );
                            
                            wp_nav_menu($Args);
                        }
                        ?>
                    </div>
                    <div class="col-10 col-right col-s-20 col-s-center" id="header-social-icons">
                        <a href="https://www.facebook.com/pages/Creative-North/1397772490509251" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/facebook_icon.png"); ?>" alt="Facebook" /></a>
                        <a href="https://twitter.com/Creative_North_" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/twitter_icon.png"); ?>" alt="Twitter" /></a>
                        <a href="https://www.youtube.com/user/ourcreativenorth" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/youtube_icon.png"); ?>" alt="YouTube" /></a>
                        <a href="https://www.linkedin.com/company/9179025" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/linkedin_icon.png"); ?>" alt="LinkedIn" /></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-20 col-hide col-s-show">
                    <div id="mobile-nav">
                        <div id="mobile-menu-control" class="fa fa-align-justify"></div>
                        <div id="mobile-menu">
                            <?php wave_nav(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-s-20 col-s-center">
                    <?php wave_logo(); ?>
                </div>
                <div class="col-10 col-right col-s-hide">
                        <?php wave_nav(); ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>