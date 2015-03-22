<?php

class WF_General extends WF_AdminOptions {

    public function options() {
        $this->tableStart();

        $this->uploadImage("Favicon", "wave_favicon", get_option("wave_favicon"), "Upload your Favicon (16x16px ico/png)");

        $this->uploadImage("Apple iPhone icon", "wave_iphone_icon", get_option("wave_iphone_icon"), "Upload your Apple iPhone Icon (120x120px png)");

        $this->uploadImage("Apple iPad icon", "wave_ipad_icon", get_option("wave_ipad_icon"), "Upload your Apple iPad Icon (152x152px png)");

        $this->tableEnd();
    }

}

?>