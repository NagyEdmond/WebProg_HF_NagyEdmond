<?php

$conn = new mysqli("localhost", "projekt_admin", "_qwerty09", "egyetem");

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}else{
    echo "Connection successful<br>";
}