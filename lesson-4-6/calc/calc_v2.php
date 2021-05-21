<?php

$oper = ['-', '+', '*', '/'];

$operation = htmlspecialchars(strip_tags($_POST["operation"]));

$arg1 = htmlspecialchars(strip_tags($_POST["val1"]));

$arg2 = htmlspecialchars(strip_tags($_POST["val2"]));

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        case '/':
            if ($arg2 == 0) {
                return "Ошибка";
            } else {
                return $arg1 / $arg2;
            }
    }
}

$result = mathOperation($arg1, $arg2, $operation);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #ddd;
    }
</style>

<body>
    <form action="/calc/calc_v2.php" method="POST">
        <input type="text" name="val1" value="<?= $arg1 ?>">
        <?php foreach ($oper as $v) : ?>
            <button name="operation" value="<?= $v ?>"><?= $v ?></button>
        <?php endforeach; ?>
        <input type="text" name="val2" value="<?= $arg2 ?>">
        <input type="text" value="<?= $result ?>"><br>
    </form>

</body>

</html>
