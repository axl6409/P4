<?php

/**
 * Define ROOT for path
 */
define('ROOT', dirname('jeanforteroche'));

/**
 * Require the App file & call load method to init Autoloaders
 */
require ROOT . '/app/App.php';
App::load();

/**
 * Set default page to home & Check if $_GET['p'] is passed to set as page
 */
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home.home';
}

/**
 * Explode page variable, delimiter with a dot
 * Set the action to the second param
 */
$page = explode('.', $page);
$action = $page[1];

/**
 * If first param is admin (then call the controller: concat second "param" & "Controller"), then set the action to the third param
 * Else if first param is home (then call the controller: concat first "param" & "Controller), then set the action to the second param
 * Else we call first param concat with Controller & set action to second param
 */
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
/**
 * Define Controller & the action to do in the Controller
 */
$controller = new $controller();
$controller->$action();
