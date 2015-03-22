<?php

$LoadWP     = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))) . "/wp-load.php";
$LoadWaveDB = dirname(dirname(dirname(dirname(__FILE__)))) . "/framework/classes/WaveDB.php";

include_once($LoadWP);
include_once($LoadWaveDB);

?>