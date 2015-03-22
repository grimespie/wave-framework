<?php

class WF_SocialMedia extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->inputBox("Dribble", "wave_dribble_link", get_option("wave_dribble_link"), "");

        $this->inputBox("Facebook", "wave_facebook_link", get_option("wave_facebook_link"), "");

        $this->inputBox("Flickr", "wave_flickr_link", get_option("wave_flickr_link"), "");

        $this->inputBox("Foursquare", "wave_foursquare_link", get_option("wave_foursquare_link"), "");

        $this->inputBox("Google+", "wave_googleplus_link", get_option("wave_googleplus_link"), "");

        $this->inputBox("Instagram", "wave_instagram_link", get_option("wave_instagram_link"), "");

        $this->inputBox("LinkedIn", "wave_linkedin_link", get_option("wave_linkedin_link"), "");

        $this->inputBox("Pinterest", "wave_pinterest_link", get_option("wave_pinterest_link"), "");

        $this->inputBox("Skype", "wave_skype_link", get_option("wave_skype_link"), "");

        $this->inputBox("Tumblr", "wave_tumblr_link", get_option("wave_tumblr_link"), "");

        $this->inputBox("Twitter", "wave_twitter_link", get_option("wave_twitter_link"), "");

        $this->inputBox("Vimeo", "wave_vimeo_link", get_option("wave_vimeo_link"), "");

        $this->inputBox("Xing", "wave_xing_link", get_option("wave_xing_link"), "");

        $this->inputBox("YouTube", "wave_youtube_link", get_option("wave_youtube_link"), "");

        $this->tableEnd();
    }

}

?>