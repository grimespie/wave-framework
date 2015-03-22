<?php
global $Wave;

if($Wave->display_topbar()) {
?>

    <div id="header-top-bar">
        <div class="container">
            <div class="col-10 col-s-20 col-left col-s-center">
                <?php wave_topbar_content("left"); ?>
            </div>
            <div class="col-10 col-s-20 col-right col-s-center">
                <?php wave_topbar_content("right"); ?>
            </div>
        </div>
    </div>

<?php
}
?>