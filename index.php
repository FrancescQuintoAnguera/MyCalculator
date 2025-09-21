<?php

session_start();

// Variable
$number1 = null;
$number2 = null;
$operator = null;
$result = null;
$arrayOperators = array('+', '-', '*', '/');

// Init history

if(!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
    $_SESSION['lastResult'] = [];
}

// function

function operation($num1, $num2, $ope ){
    switch($ope){
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num1 / $num2;
            break;
    }
    $_SESSION['history'][] = "$num1 $ope $num2 = $result";
    return $result;
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

                $_SESSION['lastResult'] = operation($number1, $number2, $operator);
                header('Location: index.php');
                exit;
            };
        ?>
        <h3>Result:</h3>
        <?php
            if (isset($_SESSION['lastResult'])) {
                echo '<p>'.$_SESSION["lastResult"].'</p><br>';
                unset($_SESSION['lastResult']);
            };
        ?>
        <h3>History:</h3>
        <?php 
            foreach ($_SESSION['history'] as $operation){
                echo "<p>$operation</p><br>";
            };
        ?>
        <form method="post">
            <button type="submit" name="clear">Clear History</button>
        </form>
        <?php
            if (isset($_POST['clear'])) {
                $_SESSION['history'] = [];
                header("Location: index.php");
                exit;
            }
        ?>
    </main>
    <footer>
        <p>Made by Francesc Quintó</p>
    </footer>
</body>
</html>