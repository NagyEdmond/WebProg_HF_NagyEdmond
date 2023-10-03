<?php

$tomb = ["A" => "Kek", "B" => "Zold", "C" => "Sarga", "D" => "Piros"];

function atalakit(array $tomb, string $forma){
    foreach ($tomb as $key => $value) {
        if ($forma == "kisbetus"){
            $tomb[$key] = strtolower($value); 
        }else if($forma == "nagybetus"){
            $tomb[$key] = strtoupper($value);
        };
    };

    print_r($tomb);
};

atalakit($tomb, "kisbetus");
echo "<br>";
atalakit($tomb, "nagybetus");

?>