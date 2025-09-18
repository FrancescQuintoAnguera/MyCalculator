<?php
// Variable
$number1 = null;
$number2 = null;
$operator = null;
$arrayOperators = array('+', '-', '*', '/');

// function

function operation($num1, $num2, $ope ){
    switch($ope){
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return $num1 / $num2;
    }
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>My Calculator</h1>
    </header>
    <main>
        <form action="index.php" method="POST">
            <input name="num1" placeholder="Choose one number"><br>
            <select name="operators">
                <?php 
                    foreach ($arrayOperators as $operator){
                        echo "<option value='$operator'>$operator</option>";
                    }
                ?>
            </select><br>
            <input name="num2" placeholder="Choose other number"><br>
            <input type="submit" value="Submit" name="submitBtn" class="padding: 1dvh"></input>
        </form>
        <?php 
            if(isset($_POST['submitBtn'])){
                $number1 = $_POST['num1'];
                $number2 = $_POST['num2'];
                $operator = $_POST['operators'];

                echo operation($number1, $number2, $operator);
            };
        ?>
    </main>
    <footer>
        <p>Made by Francesc Quintó</p>
    </footer>
</body>
</html>