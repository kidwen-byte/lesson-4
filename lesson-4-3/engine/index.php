<?php

define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');


$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$params = [];
switch ($page) {

    case 'index':
        $params['name'] = 'Админ';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
        break;
}

echo render($page, $params);


function getCatalog() {
    return [
        [
            'name' => 'Пицца',
            'price' => 24
        ],
        [
            'name' => 'Чай',
            'price' => 1
        ],
        [
            'name' => 'Яблоко',
            'price' => 12
        ],
    ];
}


function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}



//$params = ['menu' => '<a></a>', 'content' => '...', $name = 'Alex'];
function renderTemplate($page, $params = []) {
    ob_start();

    extract($params);

//    foreach ($params as $key => $value) {
//        $$key = $value;
//    }

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("404");
    }


    return ob_get_clean();
}