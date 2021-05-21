<?php

$db = mysqli_connect('localhost:3306', 'root', 'root', 'test');

$result = mysqli_query($db, "SELECT * FROM `catalog`");