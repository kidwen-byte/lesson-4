<?php
session_start();
$db = mysqli_connect("localhost", "root", "root", "shop");
$session_id = session_id();

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM  `basket` WHERE `basket` . `id` = {$id}");
    header("Location: /basket.php");
    die();
}

$basket = mysqli_query($db, "SELECT basket.id as basket_id, goods.id as goods_id, goods.price as price, goods.name as name FROM basket, goods WHERE basket.goods_id=goods.id AND session_id = '{$session_id}'");

$result = mysqli_query($db, "SELECT count(id) as count FROM `basket` WHERE `session_id` = '{$session_id}'");
$count = mysqli_fetch_assoc($result)['count'];

$result2 = mysqli_query($db, "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.goods_id=goods.id AND session_id = '{$session_id}'");
$summ = mysqli_fetch_assoc($result2)['summ'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <a href="/">Каталог</a>
    <a href="/basket.php">Корзина (<?= $count ?>)</a><br>

    <?php foreach ($basket as $value) : ?>
        <div>
            <?= $value['name'] ?><br>
            price: <?= $value['price'] ?><br>
            <a href="?action=delete&id=<?= $value['basket_id'] ?>"><button>Удалить товар</button> </a>
        </div>
        <hr>

    <?php endforeach; ?>
    ИТОГО: <?= $summ ?>
</body>

</html>