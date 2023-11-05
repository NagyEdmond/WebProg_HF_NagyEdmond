<?php


$fname = $lname = $email = "";

$attend1 = $attend2 = $attend3 = $attend4 = $term = 0;

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

if(isset($_POST["firstName"]))
{
    $fname = test_data($_POST["firstName"]);
}else
{
    $ferror = "First name is required";
}

if(isset($_POST["lastName"]))
{
    $lname = $_POST["lastName"];
}else
{
    $lerror = "Last name is required";
}

if(isset($_POST["email"]))
{
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        $email = $_POST["email"];
    }else
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
    }else{
        foreach($_POST["attend"] as $attend)
        {
            if($attend == "Event1")
            {
                $attend1 = 1;
            }elseif($attend == "Event2")
            {
                $attend2 = 1;
            }elseif($attend == "Event3")
            {
                $attend3 = 1;
            }elseif($attend == "Event4")
            {
                $attend4 = 1;
            }
        }
    }
}else
{
    $attendError = "Please select at least one option";
}

if(!isset($_POST["terms"]))
{
    $termsError = "Please accept the terms";
}else
{
    $term = 1;
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
?>


<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $fname;?>">*<?php echo $ferror;?>
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lname;?>">*<?php echo $lerror;?>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email;?>">*<?php echo $emailError;?>
    </label>
    <br><br>
    <label for="attend"> I will attend:*<?php echo $attendError;?><br>
        <input type="checkbox" name="attend[]" value="Event1" <?php if($attend1 == 1){echo "checked";}?>>Event1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?php if($attend2 == 1){echo "checked";}?>>Event2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?php if($attend3 == 1){echo "checked";}?>>Event2<br>
        <input type="checkbox" name="attend[]" value="Event4" <?php if($attend4 == 1){echo "checked";}?>>Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract *<?php echo $abstractError;?><br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value=""<?php if($term == 1){echo "checked";} ?>>I agree to terms & conditions.*<?php echo $termsError;?><br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

