<?php

$ferror = $lerror = $emailError = $attendError = $termsError = $abstractError = "";

function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_uploaded_file($file)
{
    global $abstractError;

    $MAX_FILE_SIZE = 3145728; // 3 MB

    if($file["size"] < $MAX_FILE_SIZE)
    {
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if($fileExtension != "pdf")
        {
            $abstractError = "Only PDF files are allowed";
        }
    }else
    {
        $abstractError = "File is too big";
    }
}

if(!isset($_POST["firstName"]) || empty($_POST["firstName"]))
{
    $ferror = "First name is required";
}

if(!isset($_POST["lastName"]) || empty($_POST["lastName"]))
{
    $lerror = "Last name is required";
}

if(isset($_POST["email"]) && !empty($_POST["email"]))
{
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        $emailError = "Invalid email format";
    }
}else
{
    $emailError = "Email is required";
}

if(isset($_POST["attend"]))
{
    if(empty($_POST["attend"]))
    {
        $attendError = "Please select at least one option";
    }
}else
{
    $attendError = "Please select at least one option";
}

if(!isset($_POST["terms"]))
{
    $termsError = "Please accept the terms";
}

if(isset($_FILES["abstract"]))
{

    if($_FILES["abstract"]["error"] == 0)
    {
        check_uploaded_file($_FILES["abstract"]);
    }else
    {
        $abstractError = "File must be uploaded";
    }
}

if ($ferror){echo "First name error: " . $ferror . "<br>";}
if($lerror){echo "Last name error: " . $lerror . "<br>";}
if($emailError){echo "Email error: " . $emailError . "<br>";}
if($attendError){echo "Attendance error: " . $attendError . "<br>";}
if($abstractError){echo "Abstract error: " . $abstractError . "<br>";}
if($termsError){echo "Terms error: " . $termsError . "<br>";}
?>