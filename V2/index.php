<?php
$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$year = "2018";
$content = file_get_contents("site.html");

$content = str_replace("{ TITLE }", $title, $content);
$content = str_replace("{ H1 }", $h1, $content);
$content = str_replace("{ YEAR }", $year, $content);

echo $content;
$a = 5;
$b = '05';
var_dump($a == $b);           // Почему true? Строка преобразуется в целое число.
var_dump((int)'012345');     // Почему 12345? int преобразует строки в целые числа, 01 не целое число.
var_dump((float)123.0 === (int)123.0); // Почему false? Происходит строгое сравнение типов данных.
var_dump((int)0 === (int)'hello, world'); // Почему true? Если строки в начале не содержат числа, то int преобразует строки в число 0.  

$a = 1;
$b = 2;
$a = ++$a;
$b = --$b;
echo $a . $b;

$a = 1;
$b = 2;
$a = $a + $a;
$b = $b / $b;
echo $a . $b;

$a = 1;
$b = 2;
$a += $a + $a;
$b = $a - $b;
$a -= $b;
echo $a . $b;
