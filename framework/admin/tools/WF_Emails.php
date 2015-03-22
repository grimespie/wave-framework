<?php

class WF_Emails {

    static function register_post_type() {
        $Args = array(
                      'labels' => array(
                                        'name' => 'Emails',
                                        'singular_name' => 'Email',
                                       ),
                      'public' => true,
                      'show_ui' => true,
                      'show_in_menu' => 'themes.php',
                      'supports' => array( 'title' ,'thumbnail', 'editor' ),
                     );

        register_post_type("wave-email", $Args);
    }

}

add_action("init", array("WF_Emails", "register_post_type"));

?>