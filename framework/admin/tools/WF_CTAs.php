<?php

class WF_CTAs {

    static function register_post_type() {
        $Args = array(
                      'labels' => array(
                                        'name' => 'Calls To Action',
                                        'singular_name' => 'Call To Action',
                                       ),
                      'public' => true,
                      'show_ui' => true,
                      'show_in_menu' => 'themes.php',
                      'supports' => array( 'title' ,'thumbnail', 'editor' ),
                     );

        register_post_type("wave-cta", $Args);
    }

}

add_action("init", array("WF_CTAs", "register_post_type"));

?>