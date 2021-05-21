<?php
$id = $_GET['id'];

include("db.php");

$result = mysqli_query($db, "SELECT * FROM `catalog` WHERE id='$id'");

?>

<?php foreach ($result as $v) : ?>
    <h1> <?= $v['title'] ?> </h1>
    <img src="/img/<?= $v['id'] ?>.jpg" alt="" width="150px">
    <p><?= $v['description'] ?></p>
    <p><?= $v['price'] ?> руб.</p>
    <button>Добавить в корзину</button>
<?php endforeach; ?>