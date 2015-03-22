        <div id="footer-widget-wrapper">
            <div class="container">
                <div class="col-6 col-m-20 col-m-center" id="footer-logo">
                    <img src="<?php print(get_template_directory_uri() . "/images/footer_logo.png"); ?>" alt="Creative North" />
                    <p class="copyright">&copy; Creative North <?php print(date("Y")); ?></p>
                </div>
                <div class="col-3 col-right col-m-20 col-m-center" id="footer-social-icons">
                    <a href="https://www.facebook.com/pages/Creative-North/1397772490509251" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/facebook_icon.png"); ?>" alt="Facebook" /></a>
                    <a href="https://twitter.com/Creative_North_" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/twitter_icon.png"); ?>" alt="Twitter" /></a>
                    <a href="https://www.youtube.com/user/ourcreativenorth" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/youtube_icon.png"); ?>" alt="YouTube" /></a>
                    <a href="https://www.linkedin.com/company/9179025" target="_blank"><img src="<?php print(get_template_directory_uri() . "/images/linkedin_icon.png"); ?>" alt="LinkedIn" /></a>
                </div>
                <div class="col-8 col-m-20 col-m-center">
                    <?php
                    $Args = array(
                      "theme_location" => "footer",
                      "container"      => "nav",
                      "container_id"   => "wave-topbar-menu"
                     );

                    wp_nav_menu($Args);
                    ?>
                </div>
                <div class="col-3 col-m-20 col-m-center" id="footer-creative-pioneers">
                    <img src="<?php print(get_template_directory_uri() . "/images/creative_pioneers.png"); ?>" alt="Creative Pioneers North East" />
                </div>
            </div>
        </div>