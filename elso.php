<?php

$list = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach($list as $item) {
    if(is_numeric($item)) {
        echo 'Igen';
    }else{
        echo 'Nem';
    }
    echo '<br>';
};

?>