<?php

class WF_CustomPosts extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->uploadImage("Favicon", "wave_favicon", get_option("wave_favicon"), "Upload your Favicon (16x16px ico/png)");

        $this->tableEnd();
    }

}

?>