<?php include("db.php"); ?>

<?php foreach ($result as $v) : ?>
    <a href="/item.php/?id=<?= $v['id'] ?>"><?= $v['title'] ?></a><br>
<?php endforeach; ?>