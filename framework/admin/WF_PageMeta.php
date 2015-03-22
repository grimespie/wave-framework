<?php

class WF_PageMeta {

    public function page_meta_boxes() {
        $Screens = array("post", "page");

        foreach($Screens as $Screen) {
            add_meta_box("wave-page-settings", __(ucfirst($Screen) . " Settings", "myplugin_textdomain"), array("WaveAdmin", "page_meta_boxes_content"), $Screen);
        }
    }

    public function page_meta_boxes_content($post) {
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

        $value = get_post_meta( $post->ID, '_my_meta_value_key', true );

        echo '<label for="myplugin_new_field">';
       _e( "Description for this field", 'myplugin_textdomain' );
       echo '</label> ';
       echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
    }

    public function page_meta_boxes_save() {
        // Check if our nonce is set.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) )
            return $post_id;

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) )
            return $post_id;

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return $post_id;

        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }

        /* OK, its safe for us to save the data now. */

        // Sanitize user input.
        $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

        // Update the meta field in the database.
        update_post_meta( $post_id, '_my_meta_value_key', $mydata );
    }

}

?>