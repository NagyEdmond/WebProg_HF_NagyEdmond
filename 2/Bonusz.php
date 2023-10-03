<?php

$termekek = array(
    array("nev" => "sajt","mennyiseg" => 2, "ar" => 12),
    array("nev" => "kenyer","mennyiseg" => 1, "ar" => 15)
);

function hozzaad(&$termekek, $nev, $mennyiseg, $ar){
    global $termekek;
    array_push($termekek,array("nev" => $nev, "mennyiseg" => $mennyiseg, "ar" => $ar));
};

function torles(&$termekek,$nev){
    unset($termekek[array_search($nev, $termekek)]);
};

function vegsoOsszeg(&$termekek){
    $osszeg = 0;
    foreach ($termekek as $termek) {
        $osszeg += $termek["mennyiseg"] * $termek["ar"];
    }
    return $osszeg;
};

function kiirat(&$termekek){
    echo "\/ \/ \/ \/ \/ BEVASARLO LISTA \/ \/ \/ \/ \/<br>";
    foreach ($termekek as $termek) {
        echo $termek["nev"] . ", mennyiség: " . $termek["mennyiseg"] . ", ár/db: " . $termek["ar"] . "<br>";
    }
    echo "/\ /\ /\ /\ /\ BEVASARLO LISTA /\ /\ /\ /\ /\ <br>";
}

kiirat($termekek);
echo "<br>";
hozzaad($termekek,"banán", 2, 4);
echo "<br>";
kiirat($termekek);
echo "<br>";
torles($termekek,"sajt");
echo "<br>";
kiirat($termekek);
echo "<br>";
echo "Végső összeg: ". vegsoOsszeg($termekek);

?>