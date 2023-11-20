<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
    table{
        border: 1px solid black;
        width: 30%;
        text-align: center;
        height: 30%;
    }
    td{
        border: 1px solid black;
        transition: 0.2s;
    }

    td:hover{
        background-color: lightblue;
    }
</style>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="nev" placeholder="Nev">
        <input type="text" name="szak" placeholder="Szak">
        <input type="text" name="atlag" placeholder="Atlag">
        <input type="submit" name="submit" value="Hozzaad">
    </form>

    <form method="post" action="">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>
<?php

include "sql_conn.php";
if(isset($_SESSION['edit']))
{
    if($_SESSION['edit'])
    {
        if((isset($_POST['nev']) || !empty($_POST['nev'])) && (isset($_POST['szak']) || !empty($_POST['szak'])) && (isset($_POST['atlag']) || !empty($_POST['atlag']))){
        $nev = $_POST['nev'];
        $szak = $_POST['szak'];
        $atlag = $_POST['atlag'];
        $sql = "INSERT INTO hallgatok(nev,szak,atlag) VALUES('$nev','$szak','$atlag')";
        $conn->query($sql);
        }
    }
}

$result = $conn->query("SELECT * FROM hallgatok")->fetch_all(MYSQLI_ASSOC);

if(count($result)> 0){
    echo "<table>";
    for($i = 0; $i < count($result); $i++){
        echo "<tr>";
        echo "<form method='post' action=''>";
        foreach($result[$i] as $j => $value){
            echo "<td><input type='text' name='".$j."U' value='".$value."'></td>";
        }
        echo "<td> <input type='submit' name='Update' value='Update'> </td>";
        echo "<td> <input type='submit' name='Delete' value='Delete'> </td>";
        echo "</form>";
        echo "</tr>";
    };
    echo "</table>";
}else{
    echo "0 results";
}

session_start();

if(isset($_SESSION['edit']))
{
    if($_SESSION['edit'])
    {
        if(isset($_POST['Update'])){
            $id = $_POST['idU'];
            $nev = $_POST['nevU'];
            $szak = $_POST['szakU'];
            $atlag = $_POST['atlagU'];
            $sql = "UPDATE hallgatok SET nev = '$nev', szak = '$szak', atlag = '$atlag' WHERE id = $id";
            $conn->query($sql);
        }
    }
}

if(isset($_SESSION['edit']))
{
    if($_SESSION['edit'])
    {
        if(isset($_POST['Delete'])){
            $id = $_POST['idU'];
            $sql = "DELETE FROM hallgatok WHERE id = $id";
            $conn->query($sql);
        }
    }
}



if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(count($result = $conn->query("SELECT * FROM hallgatok")->fetch_all(MYSQLI_ASSOC))){
            $_SESSION['edit'] = true;
            echo "Login successful";
        }else{
            $_SESSION['edit'] = false;
            echo "Login failed";
            session_destroy();
        }
    }
}

?>


