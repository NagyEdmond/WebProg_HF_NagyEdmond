<?php

function secondsToHours($seconds){
    if (!is_int($seconds)) {
        throw new Exception("Seconds must be an integer.");
    }
    return $seconds / 3600;
};

$seconds = 7200;

try {
    echo "$seconds seconds are equal to ". secondsToHours($seconds). " hours.";
} catch (Exception $e) {
    echo $e->getMessage();
}

?>