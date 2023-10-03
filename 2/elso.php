<?php

$multTable = function(){
    echo "<table border='1'>";
    for($i = 1; $i <= 10; $i++){
        echo "<tr>";
        for($j = 1; $j <= 10; $j++){
            if($i == $j){
                echo "<td style='background-color:cyan'>".$i*$j."</td>";
            }else{
                echo "<td>".$i*$j."</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};

$multTable();

?>