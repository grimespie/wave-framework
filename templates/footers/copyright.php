                <div id="footer-copyright-wrapper">
                    <div class="container">
                        <div class="col-15 col-s-20 col-s-center">

                            <?php
                            wp_nav_menu(array(
                                              "theme_location" => "footer",
                                              "container"      => "nav",
                                              "container_id"   => "wave-footer-menu"
                                             ));
                            ?>

                        </div>
                        <div class="col-5 col-s-20 col-right col-s-center">

                            <?php
                            global $Wave;

                            if($Wave->display_footer_social_icons()) {
                                if($Wave->get_facebook_url()) {
                                    print('<a href="' . $Wave->get_facebook_url() . '" target="_blank" class="' . wave_social_icon_class("facebook") . '"><i class="fa fa-facebook fa-2"></i></a>');
                                }

                                if($Wave->get_twitter_url()) {
                                    print('<a href="' . $Wave->get_twitter_url() . '" target="_blank" class="' . wave_social_icon_class("twitter") . '"><i class="fa fa-twitter fa-2"></i></a>');
                                }

                                if($Wave->get_googleplus_url()) {
                                    print('<a href="' . $Wave->get_googleplus_url() . '" target="_blank" class="' . wave_social_icon_class("googleplus") . '"><i class="fa fa-google-plus fa-2"></i></a>');
                                }

                                if($Wave->get_linkedin_url()) {
                                    print('<a href="' . $Wave->get_linkedin_url() . '" target="_blank" class="' . wave_social_icon_class("linkedin") . '"><i class="fa fa-linkedin fa-2"></i></a>');
                                }

                                if($Wave->get_youtube_url()) {
                                    print('<a href="' . $Wave->get_youtube_url() . '" target="_blank" class="' . wave_social_icon_class("youtube") . '"><i class="fa fa-youtube fa-2"></i></a>');
                                }

                                if($Wave->get_pinterest_url()) {
                                    print('<a href="' . $Wave->get_pinterest_url() . '" target="_blank" class="' . wave_social_icon_class("pinterest") . '"><i class="fa fa-pinterest fa-2"></i></a>');
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>