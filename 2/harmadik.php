<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So")
    );

foreach ($napok as $nyelv => $napok) {
    echo $nyelv . ": ";
    foreach ($napok as $nap) {
        if ($nap == "K" || $nap == "Cs" || $nap == "Szo"
            || $nap == "Tu" || $nap == "Th" || $nap == "Sa"
            || $nap == "Di" || $nap == "Do" || $nap == "Sa"){
            echo "<b>" . $nap . "</b> ";
        }else{
            echo $nap . " ";
        }
    }
    echo "<br>";
    
}

?>