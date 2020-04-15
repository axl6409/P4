<?php
define('ROOT', dirname('jeanforteroche'));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home.home';
}

$page = explode('.', $page);
$action = $page[1];
if($page[0] == 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} elseif($page[0] == 'home') {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();