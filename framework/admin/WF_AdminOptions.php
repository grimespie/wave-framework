<?php

/**
 *
 * Wave Frame : Admin Options
 *
 */

class WF_AdminOptions {

    public function tableStart() {
    ?>

        <table class="form-table">
            <tbody>

    <?php
    }

    public function tableEnd() {
    ?>

            </tbody>
        </table>

    <?php
    }

    public function title($title) {
    ?>

        <tr valign="top">
            <th colspan="2" class="wave-options-title">
                <h3 class="title"><?php print($title); ?></h3>
            </th>
        </tr>

    <?php
    }

    public function description($description) {
        if($description != "") {
            print('<p class="description">' . $description . '</p>');
        }
    }

    public function inputBox($label, $name, $value, $description="") {
    ?>

        <tr valign="top">
            <th scope="row">
                <label for="<?php print($name); ?>"><?php print($label); ?></label>
            </th>
            <td>
                <input name="<?php print($name); ?>" type="text" id="<?php print($name); ?>" value="<?php print($value); ?>" class="regular-text">
                <?php $this->description($description); ?>
            </td>
        </tr>

    <?php
    }

    public function checkBox($label, $name, $value, $description="") {
    ?>

        <tr valign="top">
            <th scope="row"><?php print($label); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php print($label); ?></span></legend>
                    <label for="<?php print($name); ?>"><input name="<?php print($name); ?>" type="checkbox" id="<?php print($name); ?>" value="1"><?php print($description); ?></label>
                </fieldset>
            </td>
        </tr>

    <?php
    }

    public function textArea($label, $name, $value) {
    ?>

        <tr>
            <th><label for="description"><?php print($label); ?></label></th>
            <td><textarea name="<?php print($name); ?>" id="<?php print($name); ?>" rows="5" cols="30"></textarea></td>
        </tr>

    <?php
    }

    public function select($label, $name, $options, $value, $description="") {
    ?>

        <tr>
            <th scope="row"><label for="<?php print($name); ?>"><?php print($label); ?></label></th>
            <td>
                <select id="<?php print($name); ?>" name="<?php print($name); ?>">

                    <?php
                    foreach($options as $option) {
                        $selected = "";

                        if($option["value"] == $value) {
                            $selected = "selected";
                        }
                        ?>

                        <option <?php print($selected); ?> value="<?php print($option["value"]); ?>"><?php print($option["label"]); ?></option>

                    <?php
                    }
                    ?>

                </select>
                <?php $this->description($description); ?>
            </td>
        </tr>

    <?php
    }

    public function enableDisable($label, $name, $value, $description="") {
        $this->select($label, $name, array(array("label" => "Enabled", "value" => "enabled"),
                                           array("label" => "Disabled", "value" => "disabled")), $value, $description);
    }

    public function colorPicker($label, $name, $value, $description="") {
    ?>

        <tr valign="top">
            <th scope="row">
                <label for="<?php print($name); ?>"><?php print($label); ?></label>
            </th>
            <td>
                <input name="<?php print($name); ?>" type="text" id="<?php print($name); ?>" value="<?php print($value); ?>" class="my-color-field regular-text" />
                <?php $this->description($description); ?>
            </td>
        </tr>

    <?php
    }

    public function uploadImage($label, $name, $value, $description="") {
        $SubmitValue = "Upload Image";

        if($value != "") {
            $SubmitValue = "Choose Different Image";
        }
        ?>

        <tr valign="top">
            <th scope="row">
                <label for="<?php print($name); ?>"><?php print($label); ?></label>
            </th>
            <td>
                <input id="<?php print($name); ?>" type="hidden" size="36" name="<?php print($name); ?>" value="<?php print($value); ?>" />
                <input class="wave-upload-image-button button" type="button" value="<?php print($SubmitValue); ?>" data-input="<?php print($name); ?>"/>
                <?php $this->description($description); ?>
                <div class="wave-admin-image-preview"><?php if($value != "") { print('<img src="' . $value . '" />'); } ?></div>
            </td>
        </tr>

    <?php
    }

}

?>