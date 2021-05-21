<?php
$arr = [
    '/' => 'Главая',
    '?page=catalog' => 'Каталог',
    '?page=about' => 'О нас'
];
$menu = "";
foreach ($arr as $k => $v) {
    $menu .= "<li><a href=" . $k . ">" . $v . "</a></li>";
}
?>

<ul>
    <?= $menu ?>
</ul>