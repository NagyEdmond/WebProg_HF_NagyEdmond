<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Months</title>
    </head>
    <body>
        <form method="POST" action="">
            <select name="month">
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select>
            <input type="submit" name="submit" value="Get season">
        </form>

        <?php

        $spring = array('March', 'April', 'May');
        $summer = array('June', 'July', 'August');
        $autumn = array('September', 'October', 'November');
        $winter = array('December', 'January', 'February');


        if(isset($_POST['submit'])){
            echo "With if statement: ";
            $month = $_POST['month'];
            if(in_array($month, $spring)){
                echo "Spring";
            }elseif(in_array($month, $summer)){
                echo "Summer";
            }elseif(in_array($month, $autumn)){
                echo "Autumn";
            }elseif(in_array($month, $winter)){
                echo "Winter";
            }
        }

        echo "<br>";

        
        if(isset($_POST['submit'])){
            echo "With switch statement: ";
            $month = $_POST['month'];
            switch($month){
                case 'March':
                case 'April':
                case 'May':
                    echo "Spring";
                    break;
                case 'June':
                case 'July':
                case 'August':
                    echo "Summer";
                    break;
                case 'September':
                case 'October':
                case 'November':
                    echo "Autumn";
                    break;
                case 'December':
                case 'January':
                case 'February':
                    echo "Winter";
                    break;
            }
        }
        ?>
    </body>
</html>