<form method="" action="">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>

<?php

$rand = 0;

if(!isset($_COOKIE["rand_num"]))
{
    $rand = random_int(1,10);
    setcookie("rand_num", $rand);
}else
{
    $rand = $_COOKIE["rand_num"];
}

if(isset($_GET["talalgatas"]))
{   
    $szam = $_GET["talalgatas"];
    if(!is_numeric($szam))
    {
        throw new Exception("Nem szám");
    }
    if($szam == $rand){
        echo "Kitalálta a számot!";
        setcookie("rand_num", random_int(1,10));
    }else
    {
        echo "Nem találta ki a számot!";
    }
}

?>