<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            body{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            div{
                display: flex;
                justify-content: center;
            }

            input{
                width: 25%;
            }

            form{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="">
            <div>
                <input type="text" placeholder="First number" name="firstNumber">
                <input type="text" placeholder="Operator" name="operator">
                <input type="text" placeholder="Second number" name="secondNumber">
            </div>
            <input type="submit" name="calc" value="Calculate">
        </form>
        <br>

        <?php

            function doCalc($firstNumber, $operator, $secondNumber){
                if (!is_numeric($firstNumber) || !is_numeric($secondNumber)) {
                    throw new Exception("Numbers field must be numeric.");
                }
                switch($operator){
                    case '+':
                        return $firstNumber + $secondNumber;
                    case '-':
                        return $firstNumber - $secondNumber;
                    case '*':
                        return $firstNumber * $secondNumber;
                    case '/':
                        if ($secondNumber == 0){
                            throw new Exception("Cannot divide by zero.");
                        }
                        return $firstNumber / $secondNumber;
                    default:
                        throw new Exception("Invalid operator");
                    
                }
            }

            if(isset($_POST['calc'])){
                $firstNumber = $_POST['firstNumber'];
                $operator = $_POST['operator'];
                $secondNumber = $_POST['secondNumber'];
                try{
                    echo "The result is: ". doCalc($firstNumber, $operator, $secondNumber);
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }

        ?>
    </body>
</html>